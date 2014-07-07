@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
Create New Newsletter
@stop

@section('heading')
<h1>Create New Newsletter</h1>
@stop

@section('form-items')

<div class="form-group">
    {{ Form::label( "title" , 'Newsletter Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
    <div class="col-lg-10">
        {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Newsletter Title' ) ) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label( "content" , 'Newsletter Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
    <div class="col-lg-10">
        {{ Form::textarea( "content" , Input::old( "content" ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Newsletter content' ) ) }}
    </div>
</div>

@stop