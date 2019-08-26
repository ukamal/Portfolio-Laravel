<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;

class GalleryController extends Controller
{
    private $table = 'galleries';
    //List Gallery
    public function index(){
        //Get All Gallery Cover
        $galleries = DB::table($this->table)->get();
        return view('gallery/index', compact('galleries'));
    }
    //Show Create Form
    public function create(){
        //Check Logged In
        if (!Auth::check()){
            return \Redirect::route('gallery.index');
        }
       return view('gallery/create');
    }
    //Store Gallery
    public function store(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;
        //Check Image Upload
        if ($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();
            $cover_image->move(public_path('images'), $cover_image_filename);
        }else{
            $cover_image_filename = 'noimage.jpg';
        }
        //Insert Gallery
        DB::table($this->table)->insert([
            'name'        => $name,
            'description' => $description,
            'cover_image' => $cover_image_filename,
            'owner_id'    => $owner_id
        ]);
        //Set Message
        \Session::flash('message', 'Gallery Created');
        //Redirect
        return \Redirect::route('gallery.index');
    }
    //Show Gallery Photo
    public function show($id){
        //Get Gallery
        $gallery = DB::table($this->table)->where('id', $id)->first();
        //Get Photos
        $photos = DB::table('photos')->where('gallery_id', $id)->get();
        //Render the view
        return view('gallery/show', compact('gallery','photos'));
    }
}
