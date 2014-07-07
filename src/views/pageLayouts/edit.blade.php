@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit Layout: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Layout Title</span>

            {{ Form::text( "title" ,Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Layout Title' ) ) }}
        </div>


    </div>
<!--<div class="form-group">
    <a href="#" class="btn btn-default" id="newContainerBtn">Add Container</a>
</div>

    <div class ="form-group" id="ajaxLoad">


    </div>-->


@stop
