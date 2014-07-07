@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
    Create New Page
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Page Title</span>
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Page Title' ) ) }}



    <span class="input-group-addon">Page Key</span>
            {{ Form::text( "key" , Input::old( "key" ) , array( 'class'=>'form-control' , 'placeholder'=>'Page Key' ) ) }}
        </div>
    </div>
@stop
