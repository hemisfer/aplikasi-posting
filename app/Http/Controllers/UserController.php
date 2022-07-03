<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        // $data = User::paginate(3);
        return view ('user.index', compact('data'));
    }

    public function add()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
       $request->validate( [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        } catch (Exception $error) {
            //jika error
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $data = User::find($id);

        return view('user.edit', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            //ambil data user bdsrkn idnya
            $id = $request->id;
            $user = User::find($id);

            // jika kolom password tdk kosong, maka update field nya
            if($request->password) {
                $passwordBaru = Hash::make($request->password);
            } else {
                // jika kolom password kosong, maka passwordnya tetap yg pass lama tdk berubah
                $passwordBaru = $user->password;
            } 

            // update data
            User::where('id', $id)->update([
                'name' => $request->name,
                'password' => $passwordBaru,
            ]);

            return redirect('user');
        } catch (Exception $error) {
            //jika terjadi error
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        try {
             User::destroy($id);
             return redirect('user');
        } catch (Exception $error) {
            // kalo error
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }
}
