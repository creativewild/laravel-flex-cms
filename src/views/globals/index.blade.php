@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Manage Pages
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-{{ $menu_items['globals']['icon'] }}"></span> Manage Globals</h1>
    </div>
    <div class="panel-body">
        <div class="callout ">
            <span class="glyphicon glyphicon-info-sign callout-content"></span>
            <p >  Globals Work just like pages except what you add to them appears everywhere.</p>
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
                    <th>Created</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr >
                    <td ><a href="{{ $edit_url.$item->id }}">{{ $item->id }}</a></td>
                    <td><a href="{{ $edit_url.$item->id }}">{{ $item->key }}</a></td>
                    <td><a href="{{ $edit_url.$item->id }}">{{ $item->created_at }}</a></td>

                    <td>

                            <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary">Edit Item</a>

                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        @if($item->blocks()->count())
                        <h5 style="color:darkolivegreen"><span></span>Content Blocks</h5>
                        <table class="table table-hover table-responsive">



                                <tr>
                                    <th>&nbsp; </th>
                                    <th>Block Title</th>
                                    <th>Created at</th>

                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>

                            @foreach($item->blocks()->get() as $block)
                            <tr>
                                <td></td>
                                <td><a href="/admin/blocks/edit/{{$block->id}}">{{$block->title}}</a></td>
                                <td>{{$block->created_at}}</td>
                                <td><a href="#" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-remove"></span> </a></td>
                                <td></td>

                            </tr>
                            @endforeach

                        </table>
                        @else
                            <h5 style="color:grey">No Blocks yet</h5>
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
