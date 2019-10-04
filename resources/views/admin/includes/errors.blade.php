<?php
/**
 * Created by PhpStorm.
 * User: m.sain
 * Date: 6/18/2018
 * Time: 6:51 PM
 */
?>
@if(count($errors)>0)
    <ul class="list-groups">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif

