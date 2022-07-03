<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use App\Models\Posting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    //
    public function index ()
    {
        $data = Konfigurasi::all();

        return view ('konfigurasi.index', compact('data'));
    }

    public function add()
    {
        $konfigurasi = Konfigurasi::all();

        return view('konfigurasi.add');
    }

    public function store(Request $request)
    {
        $request->validate([

            'gambar' => 'required|image|file|max:2048',
            'about' => 'required',
            'contact' => 'required',
            'hubungikami' => 'required'
        ]);

        try {
            $gambarPath = $request->file('gambar')->store('logo-images');

            Konfigurasi::create([
                'gambar' => $gambarPath,
                'about' => $request->about,
                'contact' => $request->contact,
                'hubungikami' => $request->hubungikami
            ]);

            return redirect('konfigurasi');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $data = Konfigurasi::find($id);
        return view('konfigurasi.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
       try {
            $data = Konfigurasi::find($request->id);
            
           if ($request->file('gambar')) {
                if($data->gambar){
                    Storage::delete($data->gambar);
                }

            $gambarPath = $request->file('gambar')->store('logo-images');

               Konfigurasi::where('id', $request->id)->update([
                'gambar' => $gambarPath,
                'about' => $request->about,
                'contact' => $request->contact,
                'hubungikami' => $request->hubungikami


            ]);
            } else {
                Konfigurasi::where('id', $request->id)->update([
                    
                    'about' => $request->about,
                    'contact' => $request->contact,
                    'hubungikami' => $request->hubungikami

                ]);
            }
            return redirect ('konfigurasi');

        } catch (Exception $error) {
            return redirect()->back()->with(['failed' => $error->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
              $data = Konfigurasi::find($id);

              if ($data->gambar){
                Storage::delete($data->gambar);
              }

              Konfigurasi::destroy($id);
              return redirect ('konfigurasi');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }
}
