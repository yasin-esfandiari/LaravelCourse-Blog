<?php
/**
 * Created by PhpStorm.
 * User: m.sain
 * Date: 6/17/2018
 * Time: 2:52 PM
 */
?>
@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create New Post
        </div>
        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                     @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Store Post</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop

@section('styles')
@stop
@section('scripts')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script language="javascript">
        CKEDITOR.replace('content', {
            language: 'en'
        });
    </script>
@stop