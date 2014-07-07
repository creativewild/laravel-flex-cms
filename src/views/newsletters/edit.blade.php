@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')

@stop

@section('heading')

@stop

@section('form-items')

<div class="form-group">
    {{ Form::label( "title" , 'Newsletter Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
    <div class="col-lg-10">
        {{ Form::text( "title" , Input::old( "title", $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Newsletter Title' ) ) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label( "content" , 'Newsletter Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
    <div class="col-lg-10">
        {{ Form::textarea( "content" , Input::old( "content" , $item->content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Newsletter Description' ) ) }}
    </div>
</div>

<div class="form-group">

    <div class="col-lg-10">
        <a href="/admin/newsletters/send/{{$item->id}}" class="btn btn-primary btn-sm">Send</a>
    </div>
</div>
@stop