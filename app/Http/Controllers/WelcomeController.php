<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use App\Models\Posting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{

    public function topik ()
    {
        $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $topik = $data->groupBy('topik')->get();
        return $topik;
    }

    public function konfigurasi ()
    {
        $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = Konfigurasi::first();
        return $konfigurasi;
    }

    public function arsip ()
    {
        $data = DB::table('postings')
        ->select(DB::raw('MONTH(created_at) month, created_at bulan'))
        ->groupby('month')
        ->orderBy('bulan', 'DESC')
        ->get();
        // dd($data);
        return $data;
    }

    public function index ()
    {
        $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = $this->konfigurasi();
        // dd($konfigurasi);
        $recentpost = $this->recentpost();
        if(request('keyword'))
             {
                $data->where('judul', 'like', '%' . request('keyword') . '%');
                $data->orWhere('isi', 'like', '%' . request('keyword') . '%');
                $data->orWhereRelation('user', 'name', 'like', '%' . request('keyword') . '%');
             }
        
        $post = $data->get();
        $topik = $this->topik();
        $archive =  $this->arsip();

        // dd($topik);
        return view ('welcome', compact('post', 'konfigurasi', 'topik', 'recentpost', 'archive'));
    }

    public function single($id)
    {
        $data = Posting::find($id);
        // $user = User::all();
        $user = User::find($id);
        $konfigurasi = $this->konfigurasi();
        $topik = $this->topik();
        $recentpost = $this->recentpost();


        return view('singles.single', compact('data','user','konfigurasi', 'topik', 'recentpost'));
    }

    public function about()
    {
        
        $data  = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = $this->konfigurasi();
        $topik = $this->topik();

        // dd($konfigurasi);

        return view ('singles.about', compact('data', 'konfigurasi', 'topik'));
    }

    public function contact()
    {
        $data  = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = $this->konfigurasi();

        $topik = $this->topik();


        return view ('singles.contact', compact('data', 'konfigurasi', 'topik'));
    }

   public function spesifik($topik)
   {

    $data = Posting::with(['user'])->where('topik', $topik)->orderBy('created_at', 'DESC');
    $post = $data->get();
    $recentpost = $this->recentpost();

    $konfigurasi = $this->konfigurasi();
    $topik = $this->topik();

    // $topik = Posting::with(['user'])->groupBy('topik')->orderBy('created_at','DESC')->get();
    // dd($post);
    return view ('singles.spesifik', compact('post', 'konfigurasi', 'topik', 'recentpost'));
   }

   public function recentpost()
   {
    $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
    $post = $data->limit(5)->get();
    
    return $post;
   }

   public function archives($archive)
   {
    $data = Posting::with(['user'])->where('created_at', $archive)->orderBy('created_at', 'DESC');
    $post = $data->get();
    $konfigurasi = $this->konfigurasi();


   

    return view('singles.archives', compact('post', 'konfigurasi', 'archive'));
   }




   
}
