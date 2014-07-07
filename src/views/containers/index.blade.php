@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Manage Pages
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-{{ $menu_items['pages']['icon'] }}"></span> Manage Containers</h1>
    </div>
    <div class="panel-body">
        <div class="callout ">
            <span class="glyphicon glyphicon-info-sign callout-content"></span>
            <p class="callout-content">  Containers are collections of columns fillable with Content Blocks. Think of it as Horizontal Layouts.</p>
        </div>
    {{-- The error / success messaging partial --}}
    @include('laravel-flex-cms::partials.messaging')
    </div>
    @if( !$items->isEmpty() )
        <table class="table table-hover table-striped table-responsive table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Layout</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr >
                <td ><a href="{{ $edit_url.$item->id }}">{{ $item->id }}</a></td>
                <td><a href="{{ $edit_url.$item->id }}">{{ $item->title }}</a></td>
                @if ($item->layouts()->first())
                <td>{{ $item->layouts()->first()->title }}</td>
                @else
                <td></td>
                @endif
                <td>
                    <div class="pull-right">
                        <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary">Edit Item</a> <a href="{{ $delete_url.$item->id }}" class="btn btn-sm btn-danger">Delete Item</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <ul class="list-group">



                    </ul>
                </td>
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
@else
<div class="alert alert-info">
    <strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
</div>
@endif
<a href="{{ $new_url }}" class="btn btn-primary pull-right">New Item</a>
</div>
@stop
