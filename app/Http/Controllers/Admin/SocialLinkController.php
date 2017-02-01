<?php

namespace App\Http\Controllers\Admin;

use App\sociallink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sociallinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sociallinks.index', [
            'sociallinks' => sociallink::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sociallinks.create', [
            'sociallink' => new sociallink
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
        $sociallink = new SocialLink;

        $sociallink->create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $sociallink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $sociallink)
    {
        return view('admin.sociallinks.edit', [
            'sociallink' => $sociallink
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $sociallink)
    {
        $sociallink->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $sociallink)
    {
        $sociallink->delete();

        return back();
    }
}
