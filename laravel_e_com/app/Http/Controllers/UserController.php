<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
    	$users = User::where('isAdmin','!=',1)->get();
    	return view('admin.user.index',compact('users'));
    }
}
