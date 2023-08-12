<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sitemapGeneratorController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return response()->view('components.sitemap')
            ->header('Content-Type', 'text/xml');
    }
}
