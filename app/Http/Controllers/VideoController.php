<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Videolist;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($videolist_id)
    {
        $videolist = videolist::find($videolist_id);
        $videos = Video::where('$videolist_id', $$videolist_id)->get();
        foreach ($videos as $video) {
            if ($video->active == True) {
                $video->active = 'Yes';
            } else {
                $video->active = 'No';
            }
        }
        return view('video.video', compact('videos', 'videolist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($videolist_id)
    {
        $videolist = videolist::where('id', $videolist_id)->first();
        return view('video.create', compact('videolist'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($videolist_id,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:videos|max:255',
            'description' => 'required',
            'active' => 'required',
            'link' => 'url'
        ]);
        $video = new Video;
        $video->name = $request->name;
        $video->description = $request->description;
        if ($request->active == 'Yes') {
            $video->active = True;
        } else {
            $video->active = False;
        }
        $video->link = $request->link;
        $video->videolist_id = $videolist_id;
        $video->save();
        return redirect('/videolist/' . $videolist_id . '/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'active' => 'required',
            'link' => 'url'
        ]);
        $video = Video::find($request->id);
        $video->name = $request->name;
        $video->description = $request->description;
        if ($request->active == 'Yes') {
            $video->active = True;
        } else {
            $video->active = False;
        }
        $video->link = $request->link;
        $video->save();
        return redirect('/videolist/' . $video->videolist_id . '/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect('/videolist/' . $video->videolist_id . '/videos');
    }
}
