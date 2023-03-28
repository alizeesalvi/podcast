<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;

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

}
