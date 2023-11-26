<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files=Media::all();
        return view('media.index' ,compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataval=$request->validate([
            'file'=>'required|image|mimes:png,jpg|max:255',
            'description'=>'required|string|max:5000'
        ]);
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $n = $file->getClientOriginalName();
            $ex = time() . '.' . $n;
            $file->move('media/image/', $ex);
            $path=$ex;
        }
        Media::create([
        'description'=>$dataval['description'],
        'file'=>$path,
    ]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file=Media::where('id' ,$id)->delete();
        return redirect()->back();
    }
}
