<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome');
    }

    

    
    public function aboutUs()
    {
        return Inertia::render('AboutComponent');
    }

    public function tours()
    {
        return Inertia::render('ToursComponent');
    }

    public function gallery()
    {
        return Inertia::render('GalleryComponent');
    }
}
