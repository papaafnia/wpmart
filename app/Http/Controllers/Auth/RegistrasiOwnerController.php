<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;

class RegistrasiOwnerController extends Controller
{
    //
    public function registrasiowner(Request $request)
    {
        
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->status   = 'Active';
        $user->image    = 'male-avatar.png';
        $user->save();

        $role   = Role::find($request->role);
        $user->attachRole($role->id);
        
        Session::flash('store',' Data berhasil di tambah!');
        return redirect()->back();
    }

    public function updateprofile(Request $request, $id){


        
        $user           = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->status   = $request->status;
        
        $tujuan_upload = 'file/images/avatar';

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $nama_file = time()."".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $user->image=$nama_file;
        }
        
        $user->save();

        // $role   = Role::find($request->role);
        // $user->attachRole($role->id);
        
        Session::flash('store',' Data berhasil di tambah!');
        return redirect()->back();
    }
}


// $2y$10$8dFe8/WMWRzmQovEYr4YGuZ.MuW65IJKAv/nw9nREr4hidXy8hOEu