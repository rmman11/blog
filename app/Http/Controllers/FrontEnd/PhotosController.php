<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
    	return view('front-end.photos.create')->with('album_id', $album_id); 
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'title' => 'required',
    		'photo' => 'image:max:2999',
    	]);

    	$fullFilename = $request->file('photo')->getClientOriginalName();
    	$filename = pathinfo($fullFilename, PATHINFO_FILENAME);

    	$extension = $request->file('photo')->getClientOriginalExtension();

    	$filenameToStore = $filename . "_" . time() . "." . $extension;

    	$path = $request->file('photo')->move('public/album_covers/photos/'.$request->input('album_id'), $filenameToStore);

    	$photo = new Photo;

    	$photo->album_id = $request->input('album_id');
    	$photo->title = $request->input('title');
    	$photo->description = $request->input('description');
    	$photo->photo = $filenameToStore;
    	//$photo->size = $request->file('photo')->getClientSize();

    	$photo->save();

    	return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Added!');
    }

    public function show($id){
    	$photo = Photo::find($id);
    	return view('front-end.photos.show')->with('photo', $photo);

    }

    public function destroy($id){
    	$photo = Photo::find($id);
    	$album_id = $photo->album_id;
    	if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
    		$photo->delete();
    	}

    	return redirect('/albums/'.$album_id)->with('success', 'Photo Deleted!');
    }
}
