<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

use App\Models\training;
use App\Models\User;
use App\Models\Cart;
use App\Models\pembayaran;
use App\Models\tb_merchandise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class profil extends Controller
{
    public function profile(){
        $user = Auth::user();

        return view('profile.lihat_profil',compact(['user']));
    }

    public function konfigurasi_akun(){
        return view('profile.show');
    }

    public function edit_profile($id){
        $edit_profil= User::find($id);
        return view('profile.edit_profile',compact(['edit_profil']));
    }

    public function update_profile($id, Request $request){
       $update_profile=user::find($id);
       $update_profile->update($request->except(['_token','submit']));
        return redirect('/profile');
    }
}
