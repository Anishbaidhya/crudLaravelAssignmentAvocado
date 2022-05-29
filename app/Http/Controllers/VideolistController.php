<?php

namespace App\Http\Controllers;

use App\Models\Videolist;
use Illuminate\Http\Request;

class VideolistController extends Controller
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
        return view('videolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:videolist|max:255',
            'description' => 'required',
        ]);
        $videolist = new \App\Models\videolist;
        $videolist->name = $request->name;
        $videolist->description = $request->description;
        $videolist->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videolist  $videolist
     * @return \Illuminate\Http\Response
     */
    public function show(Videolist $videolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videolist  $videolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Videolist $videolist)
    {
        return view('videolist.edit', compact('videolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videolist  $videolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videolist $videolist)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $videolist->update($validated);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videolist  $videolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videolist $videolist)
    {
        $videolist->delete();

        return redirect('/')
            ->with('success', 'Post deleted successfully');
    }
}
