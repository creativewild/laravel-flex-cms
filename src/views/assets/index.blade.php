@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Manage Assets
@stop

@section('content')

    <h1>Manage Assets</h1>
    <p>Assets are files (css,js,imgs) that can be shared globally or between resources, either blocks or pages.</p>
    

    {{-- The error / success messaging partial --}}
    @include('laravel-flex-cms::partials.messaging')
    
    @if( !$items->isEmpty() )
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Key</th>
                    <th>Created</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->id }}</a></td>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->title }}</a></td>
                        <td><a href="{{ $edit_url.$item->id }}">{{ $item->global}}</a></td>
                        <td>
                            <div class="pull-right">
                                <a href="{{ $edit_url.$item->id }}" class="btn btn-sm btn-primary">Edit Item</a> <a href="{{ $delete_url.$item->id }}" class="btn btn-sm btn-danger">Delete Item</a>
                            </div>
                        </td>
                    </tr>
                     <tr>
                         <td colspan="4">
                            <ul class="list-group">

                  {{--  @foreach($item->posts()->get() as $post)

                               <li class="list-group-item"><a href="/admin/posts/edit/{{$post->id}}">{{$post->title}}</a> {{$post->created_at}} <a href="#" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-remove"></span> </a></li>
                    @endforeach --}}

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
@stop