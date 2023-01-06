<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    // public function menu(){
    //     return view('home.menu');
    // }
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            $user = Auth::user();
            $users = DB::table('users')
            ->where('users.usertype','=','0')
            ->count('users.id');

            $training =DB::table('training')
            ->count('training.id');

            $trainer = DB::table('trainer')
            ->count('trainer.id');
                return view('admin.dashboard_admin',compact(['users','training','trainer','user']));

        }else if($usertype =='2'){
            $user = Auth::user();
            return view('trainer.dashboard_trainer',compact(['user']));
        }
        else{
            $user = Auth::user();
            return view('user.dashboard_user',compact(['user']));
        }
    }
}
