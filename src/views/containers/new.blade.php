@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
    Create New Layout
@stop

@section('heading')

@stop

@section('form-items')


    <div class="input-group" id="containerTitle">

    <span class="input-group-addon">Container Title</span>

            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Container Title' ) ) }}


    </div>

<div class="col-md9">
</div>
@stop
