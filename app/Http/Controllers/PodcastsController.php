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


    public function store(Request $request)
    {
        Storage::disk('local')->put('example.txt', 'Test');
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
}
