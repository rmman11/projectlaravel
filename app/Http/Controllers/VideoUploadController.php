<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class VideoUploadController extends Controller
{
    //
     public function index()
    {
             $videos = Video::latest()->paginate(3);

        return view('videos.index', compact('videos'));
    }

      public function upload(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:51200', // Max 50MB
        ]);

        $video = $request->file('video');
      //  $path = $video->store('videos', 'public'); // stores in storage/app/public/videos

        $path = $request->file('video')->store('videos', 'public');

        Video::create([
            'title' => $request->input('title'),
            'path' => $path,
        ]);

        return back()->with('success', 'Video uploaded successfully: ' . $path);
    }

       /* ---   here  i build a function to delete file and from databse video ---*/
      public function destroy(Request $request,$id) {
 

         //asset('/storage/app/public/' . $video->file_path)
     /*-----------here is video delete-----*/
      $video = Video::findOrFail($id);
         $path = $request->file('/storage/app/public/'.$video->file_path);
     // $video_path = public_path($video->video);
 if(File::exists($path)){
           unlink($path);
       }
 
 
      $video->delete();
        return back()->with('message', 'Video has been deleted!');
 
 
     }

}
