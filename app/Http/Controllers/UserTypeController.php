<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
//Use App\User;
Use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
 
class UserTypeController extends Controller
{
	/**
     * Display a listing of the UserType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$userType=UserType::all();
        return view('UserType.userType',compact('userType'));
    }  
}