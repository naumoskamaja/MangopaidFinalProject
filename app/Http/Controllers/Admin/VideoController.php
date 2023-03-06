<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\LibHelper;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function list(){
        $videos = Video::all();
        $page = 'home-page-videos';

        return view('admin.src.video.list', compact('videos', 'page'));
    }
    public function add(){
        return view('admin.src.video.add');
    }
    public function edit($id){
        $video = Video::findOrFail($id);
        $page = 'edit-video';
        return view('admin.src.video.add',compact('video', 'page'));
    }

    public function store(){
        request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'link' => ['required'],
            'youtubeLink' => ['required'],
        ]);

        if (request('video_id') == 0) {
            $video = new Video();
        } else {
            $video = Video::find(request('video_id'));
        }
        $video->title = request('title');
        $video->description = request('description');
        $video->link = request('link');
        $video->youtube_link = request('youtubeLink');
        $video->status = 1;
        $video->save();

        return redirect('/admin/video')->with('success',__('website.action-performed-successfully'));
    }
    public function change_status($id, $status)
    {
        $video = Video::findOrFail($id);
        $redirect_page = 'video';
        return LibHelper::change_status($video, $status, $redirect_page);
    }
}
