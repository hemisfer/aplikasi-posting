<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostingController extends Controller
{
    public function index()
    {
        $data = Posting::all();
        return view ('posting.index', compact('data'));
    }

    public function add()

    {
        $user = User::all();
        
        $user_id = User::orderBy('id', 'ASC')->get();

        return view('posting.add', compact('user_id', 'user'));
    }

    public function store (Request $request)
    {
        // dd($request->all());
        // validasi data
        $request->validate( [
            'user_id' => 'required',
            'judul' => 'required|min:5|unique:postings',
            'topik' => 'required',
            'gambar' => 'required|image|file|max:2048',
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'judul.min'=> 'Judul minimal 5 karakter!'
        ]);

        try {
        //   tentukan folder penyimpanan gambarnya
        $gambarPath = $request->file('gambar')->store('product-images');

        // insert data ke tabel products
        Posting::create([
            // 'user_id' =>  Auth::user()->id, 
            'user_id' =>  $request->user_id, 
            'judul' => $request->judul,
            'topik' => $request->topik,
            'gambar' => $gambarPath,
            'isi' => $request->isi
        ]);
            return redirect('posting');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        // ambil data dari tabel user
        $user = User::orderBy('id', 'ASC')->get();

        // ambil data dari tabel posting bdsrk id yg dipilih
        $data = Posting::find($id);
        return view('posting.edit', compact('user','data'));

    }

    public function update(Request $request)
    {
        try {
        //   ambil data posting yg dipilih bdsrkn id
        $posting = Posting::find($request->id);

        // cek apakah gambar diupload atau tidak
        if ($request->file('gambar')) {

            // cek apakah field gambar pd tabel post ada isinya atau tdk
            // kalo ada

            if ($posting->gambar){
            // hapus dulu gambar lama
            Storage::delete($posting->gambar);
            }

            // upload file yg baru
            $gambarPath = $request->file('gambar')->store('product-images');

            // update data post dgn gambar
            Posting::where('id', $request->id)->update([
                'user_id' =>  $request->user_id, 
                'judul' => $request->judul,
                'topik' => $request->topik,
                'gambar' => $gambarPath,
                'isi' => $request->isi
            ]);
        } else {
            // update data post tanpa gambar
            Posting::where('id', $request->id)->update([
                'user_id' =>  $request->user_id, 
                'judul' => $request->judul,
                'topik' => $request->topik,
                'isi' => $request->isi
            ]);
        } 
          return redirect ('posting');

        } catch (Exception $error) {
            return redirect()->back()->with(['failed' => $error->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            // ambil data produk yg dipilih bdrskn idnya
            $posting = Posting::find($id);

            if($posting->gambar) {
                // hapus dulu file gambarnya
                Storage::delete($posting->gambar);
            }

            // hapus data produk yg dipilih
            Posting::destroy($id);
            return redirect ('posting');

        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }
}
