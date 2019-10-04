<?php
/**
 * Created by PhpStorm.
 * User: m.sain
 * Date: 7/9/2018
 * Time: 12:27 AM
 */
?>

@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit your profile
        </div>
        <div class="panel-body">
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" value="{{ e($user->name) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" value="{{ e($user->email) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload new avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook profile</label>
                    <input type="text" name="facebook" value="{{ e($user->profile->facebook) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube profile</label>
                    <input type="text" name="youtube" value="{{ e($user->profile->youtube) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About you</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ e($user->profile->about) }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update profile</button>
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
        CKEDITOR.replace('about', {
            language: 'en'
        });
    </script>
@stop