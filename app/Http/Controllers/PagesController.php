<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Inertia\Inertia;
use App\Models\Slide;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        $mains = DB::table('slides')
                    ->where('slide_status', '=', 'published')
                    ->where('slide_position', '=', 'main')
                    ->get();
        $subs = DB::table('slides')
                    ->where('slide_status', '=', 'published')
                    ->where('slide_position', '=', 'sub')
                    ->get();

        return Inertia::render('Welcome',['tours' => $tours, 'mains' => $mains, 'subs' => $subs]);
    }

    

    
    public function aboutUs()
    {
        return Inertia::render('AboutComponent');
    }

    public function tours()
    {
        $tours = Tour::all();
        return Inertia::render('ToursComponent', ['tours' => $tours]);
    }

    public function gallery()
    {
        $galleries = Gallery::where('gallery_status', '=','published')->get();
        return Inertia::render('GalleryComponent',['galleries' => $galleries]);
    }
}
