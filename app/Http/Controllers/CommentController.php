<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posting;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function index() 
    {
        $data = Comment::all();
        return view('comment.index', compact('data'));
    }

    // public function add()
    // {
    //     $post = Posting::all();
    //     $post_id = Posting::orderBy('id', 'asc')->get();

    //     return view('comment.add', compact('post_id', 'post'));
    // }

    public function store(Request $request)
    {
        $request->validate( [
            'post_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'phone.required' => 'Nomor telepon tidak boleh kosong!',
            'message.required' => 'Isi tidak boleh kosong!',
        ]);

        try {
              Comment::create([
                'post_id' => $request->post_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
              ]);
                return redirect()->back();
        } catch (Exception $error) {
            dd($error->getMessage());
                return redirect()->back()->with([
                    'failed' => $error->getMessage()
                ]);
        }
    }

    public function delete($id)
    {
        try {
             $comment = Comment::find($id);

             Comment::destroy($id);
             return redirect ('comment');

        } catch (Exception $error) {
              return redirect()->back()->with([
                'failed' => $error->getMessage()
              ]);
        }
    }
}
