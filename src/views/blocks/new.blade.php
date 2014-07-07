@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
    Create New Content Blocks
@stop

@section('heading')

@stop

@section('form-items')

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Block Title</span>
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Title' ) ) }}

        <span class="input-group-addon">Block Key</span>
            {{ Form::text( "key" , Input::old( "key" ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Key' ) ) }}
        </div>
</div>
    <div class="form-group">


            {{ Form::textarea( "content" , Input::old( "content" ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Block Content' ) ) }}

    </div>
    
@stop