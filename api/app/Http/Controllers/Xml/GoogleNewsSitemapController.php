<?php

namespace App\Http\Controllers\Xml;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaPress\Database\Models\Post;

class GoogleNewsSitemapController extends Controller
{
    public function show()
    {
        $breakpoint = Carbon::now()->subDays(360);
        $posts = Post::published()->where('post_date', '>=', $breakpoint)->orderBy('post_date', 'desc')->get();

        return view('xml.google.news.sitemap')->with(['posts' =>  $posts]);
    }
}
