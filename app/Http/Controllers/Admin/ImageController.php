<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Release $release)
    {
        $data = $this->processImageData($request);

        $release->images()->create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Release $release, Image $image)
    {
        return view('admin.images.edit', [
            'release' => $release,
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Release $release, Image $image)
    {
        if( $request->hasFile('image') ) {
            File::delete('uploads/' . $image->image);
        }

        $data = $this->processImageData($request);

        $image->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release, Image $image)
    {
        File::delete('uploads/' . $image->image);
        
        $image->delete();

        return back();
    }

    protected function processImageData(Request $request) {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $data = $request->all();

        if( $request->hasFile('image') ) {
            $data['image'] = $request->image->store('images', 'uploads');
        }

        return $data;
    }
}
