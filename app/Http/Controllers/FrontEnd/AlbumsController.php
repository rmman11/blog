<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$albums = Album::with('Photos')->get();
    	return view('front-end.albums.index')->with('albums', $albums);
    }

    public function create(){
    	return view('front-end.albums.create');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'cover_image' => 'image:max:2999',
    	]);

    	$fullFilename = $request->file('cover_image')->getClientOriginalName();
    	$filename = pathinfo($fullFilename, PATHINFO_FILENAME);

    	$extension = $request->file('cover_image')->getClientOriginalExtension();

    	$filenameToStore = $filename . "_" . time() . "." . $extension;

    	$path = $request->file('cover_image')->move('public/album_covers', $filenameToStore);

    	$album = new Album;

    	$album->name = $request->input('name');
    	$album->description = $request->input('description');
    	$album->cover_image = $filenameToStore;

    	$album->save();

    	return redirect('/albums')->with('success', 'Album Created!');
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('front-end.albums.show')->with('album', $album);
    }
}