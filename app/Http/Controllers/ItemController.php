<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Image;
use DB;
class ItemController extends Controller
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
        $obj = Category::all();
    	return view('admin.pages.item_add',compact('obj'));
    }
    public function store(Request $request){
        $obj = new Item();
        $obj->name = $request->name;
        $obj->desc = $request->desc;
        $obj->price = $request->price;
        $obj->quantity = $request->quantity;
        $obj->status = $request->status;
        $obj->category_id = $request->option;
        $filenames = $request->file('filename');
        foreach ($filenames as $rawImage) {
            $originalImage = Image::make($rawImage);
            $thumbnailPath = public_path().'/upload/thumbnail/';
            $originalPath = public_path().'/upload/image/';
            $name_only = $rawImage->getClientOriginalName();
            $current_time = time();
            $name = $current_time.'_'.$name_only;
            $originalImage->save($originalPath.$name);
            $originalImage->resize(150,150);
            $originalImage->save($thumbnailPath.$name);
            $obj->filename = $name;
            if ($obj->save()) {
                return redirect()->to('admin/item/list');
            }
        }

    }
    public function item_list(){
        $obj = DB::table('items')
                   ->join('categories','categories.id','items.category_id')
                   ->select('items.id','items.name','items.price','items.quantity','items.filename','items.status','categories.name as catname')
                   ->get();
        return view('admin.pages.item_list',compact('obj'));
    }
    public function item_edit($id){
        $obj = Item::find($id);
        $data = Category::all();
        return view('admin.pages.item_edit',compact('obj'),compact('data'));
    }
    public function update_item(Request $request, $id){
        $obj = Item::find($id);
        $obj->name = $request->name;
        $obj->desc = $request->desc;
        $obj->price = $request->price;
        $obj->quantity = $request->quantity;
        $obj->status = $request->status;
        $obj->category_id = $request->option;
        if ($obj->save()) {
            return redirect()->to('admin/item/list');
        }
    }
    public function delete_item($id){
        $obj = Item::find($id);
        if ($obj->delete()) {
            return redirect()->to('admin/item/list');
        }
    }
    
}
