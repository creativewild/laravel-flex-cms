@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
    Create New View
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">

            <span class="input-group-addon">Title</span>
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Menu Title' ) ) }}


          
        </div>
    </div>
@stop
