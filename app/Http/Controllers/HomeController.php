<?php
// File: app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // You can add logic here to fetch latest news, statistics, etc.
        // For now, we'll just return the view
        
        return view('home');
    }
    
    /**
     * Display about page
     */
    public function about()
    {
        return view('about');
    }
    
    /**
     * Display activities page
     */
    public function activities()
    {
        return view('activities');
    }
    
    /**
     * Display join/registration page
     */
    public function join()
    {
        return view('join');
    }
    
    /**
     * Display contact page
     */
    public function contact()
    {
        return view('contact');
    }
}