<?php
/**
 * Created by PhpStorm.
 * User: m.sain
 * Date: 7/14/2018
 * Time: 12:29 AM
 */
?>
@extends('layouts.frontend')

@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Search results: {{ $query }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="row">
                    <div class="case-item-wrap">
                        @if($posts->count() > 0)
                            @foreach($posts as $post)
                                <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="{{ $post->featured }}" alt="our case">
                                        </div>
                                        <a href="{{ route('post.single', [ 'slug' => $post->slug ]) }}"><h6 class="case-item__title">{{ $post->title }}</h6></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h1 class="text-center">No results found.</h1>
                        @endif()
                    </div>
                </div>
            </main>
        </div>
    </div>

@stop

