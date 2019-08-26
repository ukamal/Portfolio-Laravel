<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;

class PhotoController extends Controller
{
    private $table = 'photos';
    //Show Create Form
    public function create($gallery_id){
        //Check Logged In
        if (!Auth::check()){
            return \Redirect::route('gallery.index');
        }
       //Render the view
        return view('photo/create', compact('gallery_id'));
    }
    //Store Gallery
    public function store(Request $request){
        $gallery_id  = $request->input('gallery_id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $location    = $request->input('location');
        $image       = $request->file('image');
        $owner_id    = 1;
        //Check Image Upload
        if ($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        }else{
            $image_filename = 'noimage.jpg';
        }
        //Insert Gallery
        DB::table($this->table)->insert([
            'title'        => $title,
            'description'  => $description,
            'location'     => $location,
            'gallery_id'   => $gallery_id,
            'image'        => $image_filename,
            'owner_id'     => $owner_id
        ]);
        //Set Message
        \Session::flash('message', 'Portfolio Added');
        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }
    //Show  Photo details
    public function details($id){
        $photo = DB::table($this->table)->where('id', $id)->first();
        //Render the view
        return view('photo/details', compact('photo'));
    }
    //delete portfolio
    public function destroy($id, $gallery_id){
        $photo = DB::table($this->table)->where('id', $id)->delete();
        //Set Massage
        \Session::flash('message', 'Portfolio Deleted Successully');
        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }
    //edit portfolio
    public function edit($id){
        //check logged in
        if (!Auth::check()){
            return \Redirect::route('gallery.index');
        }

        $photo = DB::table($this->table)->where('id', $id)->first();
        //Render the view
        return view('photo/edit', compact('photo'));
    }
    //update
    public function update(Request $request){
        $id          = $request->input('id');
        $gallery_id  = $request->input('gallery_id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $location    = $request->input('location');
        $image       = $request->file('image');
        $owner_id    = 1;
        //Check Image Upload
        if ($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);

            DB::table($this->table)->where('id', $id)->update([
                'title'        => $title,
                'description'  => $description,
                'location'     => $location,
                'gallery_id'   => $gallery_id,
                'image'        => $image_filename,
                'owner_id'     => $owner_id
            ]);
        }else{
            DB::table($this->table)->where('id', $id)->update([
                'title'        => $title,
                'description'  => $description,
                'location'     => $location,
                'gallery_id'   => $gallery_id,
                'owner_id'     => $owner_id
            ]);
        }
        //Set Message
        \Session::flash('message', 'Portfolio Updated Successfully');
        //Redirect
//        return \Redirect::route('photo.edit', array('id' => $id));
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }
}
