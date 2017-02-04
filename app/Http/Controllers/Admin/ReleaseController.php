<?php

namespace App\Http\Controllers\Admin;

use App\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.releases.index', [
            'releases' => Release::get()->sortBy('sort_order')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.releases.create', [
            'release' => new Release
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $release = new Release;

        $data = $this->processReleaseData($request, $release);
        
        $new_release_id = $release->create($data)->id;

        return redirect('admin/releases/' . $new_release_id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show(Release $release)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function edit(Release $release)
    {
        return view('admin.releases.edit', [
            'release' => $release->load('downloads')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Release $release)
    {
        $data = $this->processReleaseData($request, $release);
        
        $release->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        $release->delete();

        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function processReleaseData(Request $request, Release $release) {
        $this->validate($request, [
            'title' => 'required',
            'artist' => 'required'
        ]);
        
        $data = $request->all();

        if( $request->hasFile('cover') ) {
            File::delete('uploads/' . $release->cover);

            $data['cover'] = $request->cover->store('images', 'uploads');
        }
        
        if( $request->hasFile('background') ) {
            File::delete('uploads/' . $release->background);
            
            $data['background'] = $request->background->store('images', 'uploads');
        }

        return $data;
    }
}
