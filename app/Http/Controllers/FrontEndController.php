<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
        $laravel = Category::find(4);
        $career = Category::find(7);


        return view('index',[
            'title' => $settings->site_name,
            'categories' => $categories,
            'first_post' => $first_post,
            'second_post' => $second_post,
            'third_post' => $third_post,
            'career' => $career,
            'laravel' => $laravel,
            'settings' => $settings,
        ]);
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        $settings = Setting::first();
        $categories = Category::take(5)->get();
        $tags = Tag::all();


        return view('single', [
            'post' => $post,
            'title' => $post->title,
            'settings' => $settings,
            'categories' => $categories,
            'next' => Post::find($next_id),
            'prev' => Post::find($prev_id),
            'tags' => $tags
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $settings = Setting::first();
        $categories = Category::take(5)->get();

        return view('category', [
            'category' => $category,
            'title' => $category->name,
            'settings' => $settings,
            'categories' => $categories,
        ]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $settings = Setting::first();
        $categories = Category::take(5)->get();

        return view('tag', [
            'tag' => $tag,
            'title' => $tag->tag,
            'settings' => $settings,
            'categories' => $categories,
        ]);
    }
}
