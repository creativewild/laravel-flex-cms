@extends('laravel-flex-cms::layouts.interface')

@section('content')


    @yield('heading')

<div class="panel panel-default">
    <div class="panel-heading">
        <h1><a href="/{{$urlSegment}}/{{$model}}"  class="glyphicon glyphicon-{{ $menu_items[$model]['icon'] }} back_link"> </a> New {{ucwords(rtrim($model,"s"))}}</h1>
    </div>
    <div id="newContainer">
    {{ Form::open( array( 'url'=>$new_url , 'files' => true,'class'=>'form-horizontal form-top-margin' , 'role'=>'form' ) ) }}

        {{-- The error / success messaging partial --}}
        @include('laravel-flex-cms::partials.messaging')
        <div class="panel-body">
        @yield('form-items')
        </div>
        {{ Form::submit('Create Item' , array('class'=>'btn btn-large btn-primary pull-right')) }}
        <a class="btn btn-large btn-primary pull-right" href="/{{$urlSegment}}/{{$model}}">Cancel</a>
    {{ Form::close() }}
    </div>
</div>
@stop