<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\trainer;
use App\Models\training;
use App\Models\jadwal_latihan;
use App\Models\list_kelas;
use App\Models\pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\jenis_trainer;
use Illuminate\Support\Facades\Redirect;

class TrainerController extends Controller
{
    public function list_member(){
        $user = Auth::user();
        return view('trainer.list_member',compact(['user']));
       
    }

    public function list_mbr($id){
        $user = Auth::user();
        $list_member=DB::table('list_kelas')
        ->join('users','list_kelas.id_user','=','users.id')
        ->get();
        return view('trainer.list_mbr',compact(['list_member','user']));
    }

    public function jadwal_training(){
        $user = Auth::user();
        $jadwal_training= DB::table('jadwal_latihans')
        ->join('training', 'jadwal_latihans.id_latihan', '=', 'training.id')
        ->join('trainer', 'jadwal_latihans.id_trainer', '=', 'trainer.id')
        ->join('users', 'trainer.id_user', '=', 'users.id')
        ->where('usertype','=','2')
        ->where('users.id','=',$user->id)
        ->select('*','jadwal_latihans.id as id_jadwal')
        // ->select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->get();
        return view('trainer.jadwal_training', compact(['jadwal_training','user']));
    }

    public function dashboard_trainer(){
        $user = Auth::user();
        return view('trainer.dashboard_trainer', compact(['user']));
    }

    public function pengajuan(){
        $user = Auth::user();
        $jadwal_training= DB::table('jadwal_latihans')
        ->join('training', 'jadwal_latihans.id_latihan', '=', 'training.id')
        ->join('trainer', 'jadwal_latihans.id_trainer', '=', 'trainer.id')
        ->join('users', 'trainer.id_user', '=', 'users.id')
        ->where('usertype','=','2')
        ->where('users.id','=',$user->id)
        ->select('*','jadwal_latihans.id as id_jadwal')
        // ->select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->get();
        return view('trainer.pengajuan', compact(['user','jadwal_training']));
    }

    public function gt_pengajuan(request $request, $id){
        
        $user = Auth::user();
        $jadwal_training= DB::table('jadwal_latihans')
        ->join('training', 'jadwal_latihans.id_latihan', '=', 'training.id')
        ->join('trainer', 'jadwal_latihans.id_trainer', '=', 'trainer.id')
        ->where('jadwal_latihans.id','=',$id)
        ->select('*','jadwal_latihans.id as id_jadwal')
        // ->select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->first();
       
        return view('trainer.form_pengajuan', compact(['user','jadwal_training']));
    }

    public function tambah_pengajuan(request $request, $id){
        $gt= new pengajuan;
        $jadwal_training= DB::table('jadwal_latihans')
        ->join('training', 'jadwal_latihans.id_latihan', '=', 'training.id')
        ->join('trainer', 'jadwal_latihans.id_trainer', '=', 'trainer.id')
        ->where('jadwal_latihans.id','=',$id)
        ->select('*','jadwal_latihans.id as id_jadwal')
        // ->select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->first();
        $gt->alasan_pengajuan=$request->alasan_pengajuan;
        $gt->hari=$request->hari;
        $gt->jam_awal=$request->jam_awal;
        $gt->jam_akhir=$request->jam_akhir;
        $gt->id_trainer=$jadwal_training->id_trainer;
        $gt->id_latihan=$jadwal_training->id_latihan;
        $gt->id_jadwal=$id;
        $gt->save();

        return redirect('pengajuan');
    }

}
