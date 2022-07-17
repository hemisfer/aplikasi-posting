<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $comments = $this->comments();



        // dd($topik);
        return view ('welcome', compact('post', 'konfigurasi', 'topik', 'recentpost', 'archive','comments'));
    }

    public function single($id)
    {
        $data = Posting::find($id);
        // $user = User::all();
        $user = User::find($id);
        $konfigurasi = $this->konfigurasi();
        $topik = $this->topik();
        $recentpost = $this->recentpost();
        $archive = $this->arsip();
        $comments = $this->comments();
        $commentsByPostingId = $this->commentsByPostingId($id);


        return view('singles.single', compact('data','user','konfigurasi', 'topik', 'recentpost', 'archive', 'comments', 'commentsByPostingId'));
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
    $comments = $this->comments();
    $archive = $this->arsip();



    // $topik = Posting::with(['user'])->groupBy('topik')->orderBy('created_at','DESC')->get();
    // dd($post);
    return view ('singles.spesifik', compact('post', 'konfigurasi', 'topik', 'recentpost',  'comments', 'archive'));
   }

   public function recentpost()
   {
    $data = Posting::with(['user'])->orderBy('created_at', 'DESC');
    $post = $data->limit(5)->get();
    
    return $post;
   }

   public function archives($bulan)
   {
    // dd($archive);
    // $data = Posting::with(['user'])->where(DB::raw('DATE_FORMAT(cresated_at, "%M %Y")','=', 'July 2022'))->orderBy('created_at', 'DESC');
    // $post = $data->get();
    $post = Posting::with(['user'])->where(DB::raw("(DATE_FORMAT(created_at, '%M %Y'))"), "$bulan")->get();
    // dd($panggilbulan);
    // dd($post);
    // $post = DB::select("select * from postings where DATE_FORMAT(created_at, '%M %Y') = '$archive' ");
    // dd($post);
    $konfigurasi = $this->konfigurasi();
    $recentpost = $this->recentpost();
    $comments = $this->comments();
    $archive = $this->arsip();
    $topik = $this->topik();


    return view('singles.archives', compact('post', 'konfigurasi', 'archive', 'recentpost', 'comments', 'topik'));
   }

  public function comments()
   {
    $data = Comment::with(['posting'])->orderBy('created_at', 'DESC');
    $post = $data->limit(5)->get();

    return $post;
   }

   public function commentsByPostingId($posting_id)
   {
    $data = Comment::with(['posting'])->where('post_id', $posting_id)->orderBy('created_at', 'DESC')->get();

    return $data;


   }

   public function byAuthor($author)
   {

    $data = Posting::with(['user'])->WhereRelation('user', 'name', '=', $author)->orderBy('created_at', 'DESC');
    $post = $data->get();
    $recentpost = $this->recentpost();

    $konfigurasi = $this->konfigurasi();
    $topik = $this->topik();
    $comments = $this->comments();
    $archive = $this->arsip();



    // $topik = Posting::with(['user'])->groupBy('topik')->orderBy('created_at','DESC')->get();
    // dd($post);
    return view ('singles.spesifik', compact('post', 'konfigurasi', 'topik', 'recentpost',  'comments', 'archive'));
   }

   
}
