<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    protected function store(UserFormRequest $request)
    {
        $validatedData = $request->validated();
        User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_as' => $validatedData['role'],
        ]);
        return redirect('/admin/users')->with('message', 'Data user berhasil ditambah!');
    }

    public function edit(int $user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.users.edit', compact('user'));
    }
    public function logOff()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/login');
    }

    public function update(Request $request, int $user_id)
    {
        $user = User::findOrFail($user_id);

        if($user) {
            if($request->password) {
                $user->update([
                    'name' => $request['nama'],
                    'email' => $request['email'],
                    'password' =>  Hash::make($request['password']),
                    'role_as' => $request['role_as'],
                ]);
            } else {
                $user->update([
                    'name' => $request['nama'],
                    'email' => $request['email'],
                    'role_as' => $request['role_as'],
                ]);
            }

            return redirect('/admin/users')->with('message', 'Data user berhasil diperbarui');
        } else {
            return redirect('/admin/users')->with('message', 'User   ID tidak ditemukan!');
        }
    }
}
