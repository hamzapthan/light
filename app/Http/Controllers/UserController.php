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
}
