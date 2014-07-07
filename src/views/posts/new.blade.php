@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
    Create New Post
@stop

@section('heading')


@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">

            <span class="input-group-addon">Title</span>
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
        </div>
    </div>
    <div class="form-group">

            {{ Form::textarea( "content" , Input::old( "content" ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}

    </div>


@stop