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
            Create New Tag
        </div>
        <div class="panel-body">
            <form action="{{ route('tag.store') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Store Tag</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop