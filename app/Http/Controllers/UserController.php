<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class UserController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('user');
    }
    public function index(){
        $obj = Item::all();
    	return view('user.pages.index',compact('obj'));
    }
    public function cart($id){
        $obj = Item::find($id);
        return view('user.pages.cart',compact('obj'));
    }
}
