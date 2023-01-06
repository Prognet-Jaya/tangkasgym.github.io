<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\trainer;
use App\Models\training;
use App\Models\jadwal_latihan;
use App\Models\list_kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\jenis_trainer;
use App\Models\tb_merchandise;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\pengajuan;
use App\Models\pembayaran;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    public function data_pembayaran(Request $request){
        $user = Auth::user();
        $pembayaran= DB::table('tb_order')
        ->join('training', 'tb_order.id_training', '=', 'training.id')
        ->join('users', 'tb_order.id_user', '=', 'users.id')
        ->select('*','tb_order.id as id_order')
        // >select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->get();
        return view('admin.data_pembayaran',compact(['user','pembayaran']));
    }

    

    public function data_member(){

        $user = Auth::user();
        $data_member= User::all()
        ->where('usertype', '=', '0')
        ;

        return view('admin.data_member',compact(['data_member','user']));
    }

    public function daftar_latihan(){
        $user = Auth::user();
        $daftar_training= training::all();
        return view('admin.daftar_latihan',compact(['daftar_training','user']));
    }

    public function tambah_training(Request $request){
        
        
        $produk=new training;
        $produk->nama_training=$request->nama_training;
        $produk->harga_training=$request->harga_training;
        $produk->slot=$request->slot;
        $produk->deskripsi=$request->deskripsi;
        $gambar=$request ->gambar;
        $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
        $request->gambar->move('latihan',$gambarnama);
        $produk->gambar=$gambarnama;
        $produk->save();
        return redirect('/daftar_latihan')->with('message','berhasil menambahkan training');
    }
    public function edit_latihan($id){
        $user = Auth::user();
        $edit_latihan=training::find($id);
        return view('admin/edit_training',compact(['edit_latihan','user']));

    }
    public function ubah_training(Request $request,$id){
        $user = Auth::user();
        $daftar_training= training::find($id);
        $daftar_training->update($request->except(['_token','submit']));
        // return redirect('admin.daftar_latihan',compact(['daftar_training']));
        return redirect('/daftar_latihan',compact(['user']));
    }

    public function hapus_training($id){
        $user = Auth::user();
        $daftar_training= training::find($id);
        $daftar_training->delete();
        return Redirect()->back();   
    }

    public function daftar_trainer(){ 
        $user = Auth::user();
        $daftar_jenis= jenis_trainer::all();
        $daftar_user= User::all()
        ->where('usertype', '=', '2')
        ;
        $daftar_trainer= DB::table('trainer')
        ->join('jenis_trainer', 'trainer.id_jenis', '=', 'jenis_trainer.id')
        ->join('users', 'trainer.id_user', '=', 'users.id')
        ->select('*','trainer.id as id_trn')
        // >select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->get();

        $daftar_user= User::all()
        ->where('usertype', '=', '2')
        ;
        return view('admin.daftar_trainer',compact(['daftar_trainer','daftar_jenis','daftar_user','user']));
    }

    public function hapus_trainer($id){
        $hapus=trainer::find($id);
        $hapus->delete();
        return redirect('/daftar_trainer');
    }

    public function edit_trainer($id){
        $user = Auth::user();
        $daftar_jenis= jenis_trainer::all();
        $daftar_user= User::all()
        ->where('usertype', '=', '2')
        ;
        $edit=trainer::find($id);
        return view('admin/edit_trainer',compact(['edit','daftar_jenis','daftar_user','user']));
    }

    public function update_trainer($id,Request $request){
        $update_trainer=trainer::find($id);
        $update_trainer->update($request->except(['_token','submit']));
        return redirect('/daftar_trainer',compact(['user']));
    }

    public function update_member($id, Request $request){
        $user = Auth::user();
        $update_member= User::find($id);
        $update_member->update($request->except(['_token','submit']));
        return redirect('/data_member',compact(['update_member','user']));

    }

    public function delete_member($id){
        $update_member= User::find($id);
        $update_member->delete();
        return redirect('/data_member');

    }

    public function jadwal_latihan(){
        $user = Auth::user();
        $daftar_training= training::all();
        $trainer= trainer::all();
        $jadwal_training= DB::table('jadwal_latihans')
        ->join('training', 'jadwal_latihans.id_latihan', '=', 'training.id')
        ->join('trainer', 'jadwal_latihans.id_trainer', '=', 'trainer.id')
        ->select('*','jadwal_latihans.id as id_jadwal')
        // ->select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->get();

        return view('admin.jadwal',compact(['jadwal_training','trainer','daftar_training','user']));
    }

    public function edit_jadwal($id){
    
        $user = Auth::user();
        $edit=jadwal_latihan::find($id);
        
        return view('admin/edit_jadwal',compact(['edit','user']));

    }

    public function update_jadwal($id, Request $request){
        $user = Auth::user();
        $update=jadwal_latihan::find($id);
        $update->update($request->except(['_token','submit']));
        return redirect('jadwal_latihan','user');

    }

    public function daftar_member($id){
        $user = Auth::user();
        $latihan=DB::table('list_kelas')
        ->join('training', 'list_kelas.id_latihan', '=', 'training.id')
        ->join('users', 'list_kelas.id_user', '=', 'users.id')
        ->where('id_latihan', '=', $id)
        ->get();
        $user=user::all();
        return view('admin/daftar_member',compact(['latihan','user','id']));        
    }

    public function mbr(Request $request,$id){
        $user = Auth::user();
        $tambah= new list_kelas;
        $tambah->id_user= $request->id_user;
        $tambah->id_latihan= $id;
        $tambah->save();
        
        return redirect('/jadwal_latihan','user');
    }

    public function tambah_jadwal(Request $request){
        $jadwal= new jadwal_latihan;
        $jadwal->id_trainer=$request->trainer;
        $jadwal->id_latihan=$request->training;
        $jadwal->hari=$request->hari;
        $jadwal->jam_awal=$request->jam_awal;
        $jadwal->jam_akhir=$request->jam_akhir;
        $jadwal->save();

        return redirect('jadwal_latihan');
    }

    public function tambah_trainer(Request $request){
        trainer::create($request->except(['_token','submit']));
        return redirect('/daftar_trainer');
    }

    public function merchandise_admin(Request $request){
        $user = Auth::user();
       $merch=tb_merchandise::all();
       return view('admin.merchandise_admin',compact(['merch','user']));
    }

    public function tambah_merchandise(Request $request){
        
        
        $produk=new tb_merchandise;
        $produk->nama_merchandise=$request->nama_merchandise;
        $produk->harga=$request->harga;
        $produk->stok=$request->stok;
        $produk->merk_merchandise=$request->merk_merchandise;
        $produk->jenis_merchandise=$request->jenis_merchandise;
        $gambar=$request ->gambar;
        $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
        $request->gambar->move('latihan',$gambarnama);
        $produk->gambar=$gambarnama;
        $produk->save();
        return redirect()->back()->with('message','berhasil menmbahkan training');
    }
    public function edit_merchandise($id){
        $edit_merchandise=tb_merchandise::find($id);
        return view('admin/edit_merchandise',compact(['edit_merchandise','user']));

    }
    public function update_merchandise(Request $request,$id){
        $daftar_merchandise= tb_merchandise::find($id);
        $daftar_merchandise->update($request->except(['_token','submit']));
        // return redirect('admin.daftar_latihan',compact(['daftar_training']));
        return redirect('/merchandise_admin');
    }

    public function hapus_merchandise($id){
        $daftar_merchandise= tb_merchandise::find($id);
        $daftar_merchandise->delete();
        return Redirect('/merchandise_admin');   
    }

    public function list_pengajuan(){
        $user = Auth::user();
        $pengajuan=DB::table('pengajuans')
        ->join('training', 'pengajuans.id_latihan', '=', 'training.id')
        ->join('jadwal_latihans', 'pengajuans.id_jadwal', '=', 'jadwal_latihans.id')
        ->join('trainer', 'pengajuans.id_trainer', '=', 'trainer.id')
        ->select('*','pengajuans.id as id_pengajuan')
        ->get();
        $user=user::all();
        return view('admin.liat_pengajuan',compact(['pengajuan','user']));
    }

    public function ajukan($id){
        $ajukan = pengajuan::find($id);
        $ajukan->status_pengajuan="acc";
        $ajukan->save();
        return redirect()->back();
    }

    public function tolak($id){
        $ajukan = pengajuan::find($id);
        $ajukan->status_pengajuan="tolak";
        $ajukan->save();
        return redirect()->back();
    }

    public function lunas($id){
        $pelunasan = pembayaran::find($id);
        $pelunasan->status="lunas";
        $pelunasan->save();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $users= DB::table('tb_order')
        ->join('training', 'tb_order.id_training', '=', 'training.id')
        ->join('users', 'tb_order.id_user', '=', 'users.id')
        ->select('*','tb_order.id as id_order')
        // >select('users.nama_lengkap', 'jadwal_latihans.hari', 'training.nama_training')
        // ->groupBy('id_latihan')
        ->where('nama_training', 'like', "%" . $keyword . "%")->paginate(5);
    
        return redirect('data_pembayaran', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

 
}

