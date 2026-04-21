<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Service;
use App\Models\FooterSetting;
use App\Models\WhyChooseUsSection;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::where('is_active', true)->first();
        $services = Service::latest()->take(6)->get();
        $footer = FooterSetting::first();
        $whyChooseUs = WhyChooseUsSection::first();

        return view('front.home', compact('hero', 'services', 'footer', 'whyChooseUs'));
    }
}