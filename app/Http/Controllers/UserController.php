<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('roles')->get();
        
              
        return view('content.users.user-management', compact('user'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('content.users.add-user', compact('roles'));
    }

    public function store(Request $request)
    {

        $password = bcrypt($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'email_verified_at' => now()->format('Y-m-d H:i:s'),
            'nik' => $request->nik
        ]);

        // assign role
        $user->assignRole($request->role);

        return redirect()->route('user-management')->with('success-create', 'Anda Berhasil Menambahkan Data');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->with('roles')->first();
        $roles = Role::get();
        return view('content.users.edit-user', compact('user', 'roles'));
    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->delete();

        return response()->json('berhasil menghapus data');
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $password = $user->password;

        if ($request->password) {
            $password = bcrypt($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'email_verified_at' => now()->format('Y-m-d H:i:s'),
            'nik' => $request->nik
        ]);

        return redirect()->route('user-management')->with('success-update', 'Anda Berhasil Mengubah Data');
    }

    public function changepassword()
    {
        return view('content.users.change-password');
    }

    public function storechangepassword (Request $request)
    {
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
         User::where('id',Auth::user()->id)->update([
            'password'  => bcrypt($request->password)
         ]);
         return back()->with('success-update','Data Berhasil Diubah');
    }
}
