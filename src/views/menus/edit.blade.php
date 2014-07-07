@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit View: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Menu Title</span>


            {{ Form::text( "title" , Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}

            <span class="input-group-addon">Menu Key</span>
            {{ Form::text( "key" , Input::old( "key", $item->key ) , array( 'class'=>'form-control' , 'placeholder'=>'View Key' ) ) }}

        </div>
    </div>


    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Menu Pages</span>




            <?php
            //Todo pass the model
            $pages = HugoKalidas\FlexCms\Pages\Pages::where('id','<>','1')->lists('title','id');

            ?>


            {{ Form::select( "pages" ,$pages, null , array( 'class'=>'form-control chosen-select chosenDataTrigger'  ) ) }}




    </div>
        <button type="button" data-model="Menus" data-relation="pages" data-instance="{{$item->id}}" data-related=""   class="btn btn-primary btn-sm attacher pull-right">Add page to this Menu</button>
</div>



<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Pages Attached to this Menu</div>
    <div class="panel-body">

    </div>

    <!-- Table -->
    <table  class="table loadable">
        <thead>
        <tr>

            <th>Page</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if ($item->pages()->count())
        @foreach ($item->pages()->get() as $page)
        <tr>
            <td>{{$page->title}}</td>

            <td><button type="button" data-model="Menus" data-relation="pages" data-instance="{{$item->id}}" data-related="{{$page->id}}"  class="btn btn-primary btn-sm detacher">Detach</button></td>
        </tr>

        @endforeach
        @else
        <tr>
            <td>No pages yet</td>

            <td></td>
        </tr>
        @endif
        </tbody>
    </table>

    
@stop
