<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PodcastsController extends Controller
{
    //

    public function index()
    {
        $podcasts = Podcast::all();
        return view('index', ['podcasts' => $podcasts]);

    }

    public function show( Podcast $podcast)
    {
        return view('podcast', ['podcast'=> $podcast]);
    }

    public function create(Podcast $podcast){
        return view('addPodcast',['podcast' => $podcast]);
    }

    public function myPodcast()
    {
        if (Auth::user()->status == 'admin') {
            $podcasts = Podcast::all();
            return view('myPodcast', ['podcasts' => $podcasts]);
        } else {
            $podcasts = Auth::user()->podcasts;
            return view('myPodcast', ['podcasts' => $podcasts]);
        }
    }

    public function edit($id){

        $podcast = Podcast::find($id);
        return view('edit', ['podcast'=>$podcast]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'file_name'=>'required',
        ]);

        $podcast = Podcast::find($id);
        $podcast->title = $request->input('title');
        $podcast->file_name = $request->input('file_name');
        $podcast->save();

        return redirect()->route('podcast.myPodcast');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'file_name'=>'required',
            'cover_file'=>'required',
            'audio_file'=>'required',
        ]);

        $cover_file = Storage::disk('public')->put('podcast-img', $request -> cover_file);
        $audio_file = Storage::disk('public')->put('podcast-audio', $request -> audio_file);

        Podcast::create([
            'title' => $request->input('title'),
            'file_name' => $request->input('file_name'),
            'user_id' => Auth::user()->id,
            'cover_file' => $cover_file,
            'audio_file' => $audio_file,
        ]);

        return redirect()->route('podcasts.index');
    }
}
