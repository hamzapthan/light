<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function showUserAll(){
        $userAll = User::where('role',0)->get();  
     
       return view('pages.tables.allUser',compact('userAll'));
       
    }
    public function seeUserOrders($id){
                                               
     
       return view('pages.tables.allUser',compact('userAll'));
       
    }
    public function showUserOrder($id){
        $order = User::find($id);
        $userName = $order->name;
        $userOrders = $order->getUserData()->get();
     
        return view('pages.tables.ShowOrder',compact('userName','userOrders'));
   }
   
}
