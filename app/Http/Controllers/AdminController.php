<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(){
    	return view('admin.pages.index');
    }
    public function category(){
        $obj = Category::all();
        return view('admin.pages.category',compact('obj'));
    }
    public function admin_reg(){
        return view('admin.pages.admin_reg');
    }
    public function store(Request $request){
        $obj = new Category();
        $obj->name = $request->name;
        $obj->category_id = $request->option;
        if ($obj->save()) {

            return redirect('admin/category-list')->with('success');
        }
    }
    public function catList(){
        $obj = Category::all();
        return view('admin.pages.cat_list',compact('obj'));
    }
    public function cat_delete($id){
        $obj = Category::find($id);
        if ($obj->delete()) {
            return redirect()->to('admin/category-list');
        }
    }
}
