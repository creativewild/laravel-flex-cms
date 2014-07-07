@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Manage Pages
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-{{ $menu_items['pageLayouts']['icon'] }}"></span> Manage Layouts</h1>
    </div>
    <div class="panel-body">
        <div class="callout ">

            <p class="callout-content">  <span class="glyphicon glyphicon-info-sign"></span> Layouts are groups of containers and assets that provide presentation to pages.</p>
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
                    <th></th>

                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr >
                <td ><a href="{{ $edit_url.$item->id }}">{{ $item->id }}</a></td>
                <td><a href="{{ $edit_url.$item->id }}">{{ $item->title }}</a></td>


                <td>
                    <div class="pull-right">
                        <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary">Edit Item</a> <a href="{{ $delete_url.$item->id }}" class="btn btn-sm btn-danger">Delete Item</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    @if($item->containers()->count())
                    <h5 style="color:darkolivegreen"><span></span>Containers</h5>
                    <table class="table table-hover table-responsive">



                        <tr>
                            <th>&nbsp; </th>
                            <th>Container Title</th>
                            <th></th>
                            <th>&nbsp;</th>
                        </tr>

                        @foreach($item->containers()->get() as $container)
                        <tr>
                            <td></td>
                            <td><a href="/admin/containers/edit/{{$container->id}}">{{$container->title}}</a></td>
                            <td></td>
                            <td><a href="#" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-remove"></span> </a></td>


                        </tr>
                        @endforeach

                    </table>
                    @else
                    <h5 style="color:grey">No Containers yet</h5>
                    @endif
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
