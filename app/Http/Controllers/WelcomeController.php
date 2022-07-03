<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function topik ()
    {
        $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $topik = $data->groupBy('topik')->get();
        return $topik;
    }



    public function index ()
    {
        $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = Konfigurasi::first();
        // dd($konfigurasi);

        if(request('keyword'))
             {
                $data->where('judul', 'like', '%' . request('keyword') . '%');
                $data->orWhere('isi', 'like', '%' . request('keyword') . '%');
                $data->orWhereRelation('user', 'name', 'like', '%' . request('keyword') . '%');
             }
        

        if(request('topik'))
             {
                $data->where('topik', request('topik'));
             }

        $post = $data->get();
        $topik = $this->topik();
        // dd($topik);
        return view ('welcome', compact('post', 'konfigurasi', 'topik'));
    }

    public function single($id)
    {
        $data = Posting::find($id);
        // $user = User::all();
        $user = User::find($id);
        $konfigurasi = Konfigurasi::first();
        $topik = $this->topik();

        return view('singles.single', compact('data','user','konfigurasi', 'topik'));
    }

    public function about()
    {
        
        $data  = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = Konfigurasi::first();
        $topik = $this->topik();

        // dd($konfigurasi);

        return view ('singles.about', compact('data', 'konfigurasi', 'topik'));
    }

    public function contact()
    {
        $data  = Posting::with(['user'])->orderBy('created_at', 'DESC');
        $konfigurasi = Konfigurasi::first();

        $topik = $this->topik();


        return view ('singles.contact', compact('data', 'konfigurasi', 'topik'));
    }

   public function spesifik($topik)
   {

    $data = Posting::with(['user'])->where('topik', $topik)->orderBy('created_at', 'DESC');
    $post = $data->get();

    $konfigurasi = Konfigurasi::first();
    $topik = $this->topik();

    // $topik = Posting::with(['user'])->groupBy('topik')->orderBy('created_at','DESC')->get();
    // dd($post);
    return view ('singles.spesifik', compact('post', 'konfigurasi', 'topik'));
   }

   
}
