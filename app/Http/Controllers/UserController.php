<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use App\Models\training;
use App\Models\User;
use App\Models\Cart;
use App\Models\pembayaran;
use App\Models\tb_merchandise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    // public function masuk_order(Request $request){
    //    // Set your Merchant Server Key
    //         \Midtrans\Config::$serverKey = 'SB-Mid-server-3bZMDVjPgNM5I-7VaL6JSEPJ';
    //         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //         \Midtrans\Config::$isProduction = false;
    //         // Set sanitization on (default)
    //         \Midtrans\Config::$isSanitized = true;
    //         // Set 3DS transaction for credit card to true
    //         \Midtrans\Config::$is3ds = true;
            
    //         $params = array(
    //             'transaction_details' => array(
    //                 'order_id' => rand(),
    //                 'gross_amount' => 10000,
    //             ),
    //             'customer_details' => array(
    //                 'first_name' => 'budi',
    //                 'last_name' => 'pratama',
    //                 'email' => 'budi.pra@example.com',
    //                 'phone' => '08111222333',
    //             ),
    //             );
 
    //             $snapToken = \Midtrans\Snap::getSnapToken($params);
                
    //             return view('user.order',compact(['snapToken']));
    // }

    public function list_training(Request $request){
        $daftar_training=training::all();
        $user = Auth::user();
        return view('user.list_training',compact(['daftar_training','user']));
    }
    
    // public function callback(Request $request){
    //     $serverKey=config('midtrans.serverkey');
    //     $hashed= hash("sha512", $request->id.$request->status.$request->gross_amount.$serverKey);
    //     if($hashed==$request->signature_key){

    //         if($request->transaction_status=='capture'){
    //             $order=order::find($request->id);
    //             $order->update(['status'=>'paid']);
    //         }
    //     }
    // }
    public function order(Request $request,$id){
        $user = Auth::user();
        $latihan=training::find($id);
        $order =new order;
        $order->jumlah_bayar=$latihan->harga_training;
        $order->tanggal_order=now();
        $order->id_user=$user->id;
        $order->id_training=$latihan->id;
        $order->save();
        
        \Midtrans\Config::$serverKey = 'SB-Mid-server-3bZMDVjPgNM5I-7VaL6JSEPJ';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            
            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->jumlah_bayar,
                ),

                // 'item_details'=> array(
                //     'id'=> $id,
                //     'price'=>$latihan->harga_training,
                //     'name'=>$latihan->nama_training,
                // ),
                'customer_details' => array(
                    'first_name' => $user->nama_lengkap,
                    'email' => $user->email,
                    'phone' => $user->telepon,
                ),
                );
 
                $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.order',compact(['latihan','snapToken','order','user']));
    }

    // public function dashboard(){
        
    //     return view('user.dashboard');
    // }

    public function add_cart(Request $request,$id){
       
            
            $user = Auth::user();
            $training=training::find($id);
            $cart = new cart;
            // $order->tanggal_order=now();
            $cart->nama_lengkap=$user->nama_lengkap;
            $cart->email=$user->email;
            $cart->umur=$user->umur;
            $cart->telepon=$user->telepon;
            $cart->alamat=$user->alamat;
            $cart->latihan=$training->nama_training;
            $cart->harga=$training->harga_training;
            $cart->id_user=$user->id;
            $cart->id_latihan=$training->id;
            $cart->gambar=$training->gambar;
            // $cart->metode_pembayaran=$request->pembayaran;
            $cart->save();

            
        
        // $tmp = DB::table('tb_order')
        // ->join('users', 'tb_order.id_user', '=', 'users.id')
        // ->join('training', 'tb_order.id_training', '=', 'training.id')
        
        // ->get();
        
        return redirect()->back();
        
    }


    public function your_training(){
        $user = Auth::user();
        $id=Auth::user()->id;
        $latihan_user=DB::table('list_kelas')
        ->join('training', 'list_kelas.id_latihan', '=', 'training.id')
        ->join('users', 'list_kelas.id_user', '=', 'users.id')
        ->where('id_user', '=', $id)
        ->get();

       
        
        return view('user.your_training',compact(['latihan_user','user']));
    }

    public function prananda(){
        
        $id=Auth::user()->id;
        $prananda_cart=cart::where('id_user','=',$id)->get();
        return view('user.cart',compact(['prananda_cart']));
        
    }

    public function lihat_jadwal($id){
        $user = Auth::user();
        $see_jadwal=DB::table('jadwal_latihans')
        ->join('training', 'jadwal_latihans.id_latihan', '=', 'training.id')
        ->join('trainer', 'jadwal_latihans.id_trainer', '=', 'trainer.id')
        ->where('id_latihan', '=', $id)
        ->get();
        return view('user.see_jadwal',compact(['see_jadwal','user']));
    }
    public function payment(Request $request,$id){
        $user = Auth::user();
        $json=json_decode($request->get('json'));
        $pembayaran=new pembayaran();
        $pembayaran->status=$json->transaction_status;
        $pembayaran->tanggal=$json->transaction_time;
        $pembayaran->harga=$json->gross_amount;
        $pembayaran->pdf_url=$json->pdf_url;
        $pembayaran->payment_type=$json->payment_type;
        $pembayaran->payment_code=$json->payment_code;
        $pembayaran->id_order=$json->order_id;   
        $pembayaran->id_user=$user->id;

        return $pembayaran->save() ? redirect(url("/list_training"))-> with('alert-succes','pembayaran di proses') : redirect(url("/list_training"))-> with('alert-failed','pembayaran gagal proses');
        
    }
    
    public function hapus_cart($id){
        $daftar_cart= cart::find($id);
        $daftar_cart->delete();
        return redirect()->back();   
    }
    public function userjadwal_training(){
        return view('user.userjadwal_training');
    }

    public function merchandise(){
        $merch=tb_merchandise::all();
        $user = Auth::user();
        return view('user.merchandise',compact(['merch','user']));
    }

    public function status(){
        $user = Auth::user();
        return view('user.status',compact(['user']));
    }

    public function dashboard_user(){
        $user = Auth::user();
         return view('user.dashboard_user',compact(['user']));       
    }

    public function anjay(){
        return view('profile.show');
    }
}
