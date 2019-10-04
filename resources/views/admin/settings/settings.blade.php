<?php
/**
 * Created by PhpStorm.
 * User: m.sain
 * Date: 7/12/2018
 * Time: 4:47 PM
 */
?>
@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit blog settings
        </div>
        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Site name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact phone</label>
                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="opening_hours">Opening Hours</label>
                    <input type="text" name="opening_hours" value="{{ $settings->opening_hours }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact email</label>
                    <input type="text" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email_desc">Contact email description</label>
                    <input type="text" name="contact_email_desc" value="{{ $settings->contact_email_desc }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address_detailed">Address details</label>
                    <input type="text" name="address_detailed" value="{{ $settings->address_detailed }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ e($settings->about) }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update site settings</button>
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