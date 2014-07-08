@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Manage Assets
@stop

@section('content')

    <h1>Manage Includes</h1>
    <p>Includes are files</p>
    

    {{-- The error / success messaging partial --}}
    @include('laravel-flex-cms::partials.messaging')
    
    @if(!empty($items) )
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th> </th>
                    <th>Filename</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
		<?php $count = 0;?>
                @foreach($items as $item)
                    <tr>
                        <td><a href="/admin/includes/edit/{{$count}}">{{ $count }}</a></td>
                        <td></td>
                        <td><a href="/admin/includes/edit/{{$count}}">{{ $item}}</a></td>
                        <td>
                            <div class="pull-right">
                                <a href="/admin/includes/edit/{{$count}}" class="btn btn-sm btn-primary">Edit Item</a> 
                            </div>
                        </td>
                    </tr>
           
		<?php $count ++;?>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            <strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
        </div>
    @endif
   
@stop
