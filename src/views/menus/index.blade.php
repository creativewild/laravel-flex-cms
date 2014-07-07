@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Manage Menus
@stop

@section('content')
<div class="panel panel-default">

    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-{{ $menu_items['menus']['icon'] }}"></span> Manage Menus</h1>
    </div>
    <div class="panel-body">
        <div class="callout ">
            <span class="glyphicon glyphicon-info-sign callout-content"></span>
            <p class="">  Menus are navigation Elements that contain pages. Besides the global menu, secondary menus can also be included in specific pages.</p>
        </div>
        {{-- The error / success messaging partial --}}
        @include('laravel-flex-cms::partials.messaging')
    </div>
    @if( !$items->isEmpty() )

        <table class="table table-hover table-striped table-responsive table-condensed">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Key</th>

                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr>
                <td><a href="{{ $edit_url.$item->id }}">{{ $item->title }}</a></td>
                <td><a href="{{ $edit_url.$item->id }}">{{ $item->key }}</a></td>

                <td>

                        <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary">Edit Item</a> <a href="{{ $delete_url.$item->id }}" class="btn btn-sm btn-danger">Delete Item</a>

                </td>
            </tr>
            <tr>
                <td colspan="4">
                  @if($item->pages()->count())
                      <h5 style="color:darkolivegreen">Menu Pages</h5>

                            <table class="table table-hover table-responsive loadable">
                                <tr>
                                    <th>&nbsp; </th>
                                    <th>Page Title</th>
                                    <th>Page Layout</th>

                                    <th>&nbsp;</th>
                                </tr>
                            @foreach($item->pages()->get() as $page)
                                <tr>
                                    <td></td>
                                    <td><a href="/admin/pages/edit/{{$page->id}}">{{$page->title}}</a></td>
                                    @if ($page->layouts()->count())
                                    <td>{{$page->layouts()->first()->title}}</td>
                                    @else
                                    <td>No Layout</td>
                                    @endif
                                    <td><button type="button" class="btn btn-xs btn-primary detacher glyphicon glyphicon-remove" data-model="Menus" data-relation="pages" data-instance="{{$item->id}}" data-related="{{$page->id}}" ><span class=""></span> </button></td>

                                </tr>
                            @endforeach

                            </table>

                  @else
                       <h5 style="color:grey">No Pages yet</h5>
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
