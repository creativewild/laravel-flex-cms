@extends('laravel-flex-cms::layouts.interface')

@section('title')
Manage Posts
@stop

@section('content')
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1><span class="glyphicon glyphicon-{{ $menu_items['posts']['icon'] }}"></span> Manage Posts</h1>
        </div>
        <div class="panel-body">
            <div class="callout ">
                <span class="glyphicon glyphicon-info-sign callout-content"></span>

                <p> Posts can be anything from blog posts, news items to event listings. Essentially they're a timestamp
                    ordered list of content entries with images.</p>
            </div>
            {{-- The error / success messaging partial --}}
            @include('laravel-flex-cms::partials.messaging')
        </div>
        @if( !$items->isEmpty() )


    </div>
    {{-- */ $type = "fgiuasdfuiasdghfioagh"; $count=0;/* --}}
    @foreach($items as $item)
    @if (!$count)



        @endif
        @if ($item->type != $type)
        @if($count)
        </table>
        </div>
        </div>

        </div>
        @endif
        {{-- */ $type = $item->type; $count++;/* --}}

        <div class="panel panel-default">

            <div class="panel-heading">
                <h4 class="panel-title">
                    <span style="color: dodgerblue">Type: </span>{{ $item->type }} <br/><br/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color: darkolivegreen" class="glyphicon glyphicon-sort" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->type}}"> Toggle</a>
                </h4>
            </div>
            @if ($count==1)
            <div id="collapse{{$item->type}}" class="panel-collapse collapse in">
            @else
                <div id="collapse{{$item->type}}" class="panel-collapse collapse ">
            @endif
                <div class="panel-body">
                    <table class="table  table-hover table-striped table-responsive table-condensed">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>&nbsp;</th>

                        </tr>
                        </thead>





                    @endif

                        <tr class="toggled">
                            <td><a href="{{ $edit_url.$item->id }}">{{ $item->id }}</a></td>
                            <td><a href="{{ $edit_url.$item->id }}">{{ $item->title }}</a></td>
                            <td><a href="{{ $edit_url.$item->id }}">{{ $item->created_at }}</a></td>
                            <td>
                                <div class="pull-right">
                                    <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary ">Edit Item</a> <a
                                        href="{{ $delete_url.$item->id }}" class="btn btn-sm btn-danger">Delete Item</a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </table>
                </div>
            </div>
        </div>
            @else
            <div class="alert alert-info">
                <strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
            </div>
            @endif
            <a href="{{ $new_url }}" class="btn btn-primary pull-right">New Item</a>


        </div>
        @stop