@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit Layout: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">

            <span class="input-group-addon">Container Title</span>
                {{ Form::text( "title" ,Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Container Title' ) ) }}
            <span class="input-group-addon">Container Classes</span>

                <?php
                //Todo pass the model
                $elClasses = HugoKalidas\FlexCms\ElementClasses\ElementClasses::lists('html_class','id');
                $storedClasses = $item->classes()->lists('id');
                //$lay=array(null=>'--');
                $layouts = HugoKalidas\FlexCms\Layouts\Layouts::lists('title','id');
                //Todo render null
                $layouts[null] = '--';
                ?>
                    <select multiple="1" class="chosen-select" name="classes[]">
                    @foreach ($elClasses as $id => $elClass)
                        @if (in_array($id, $storedClasses ))
                        <option value="{{$id}}" selected>{{$elClass}}</option>
                        @else
                        <option value="{{$id}}">{{$elClass}}</option>
                        @endif
                    @endforeach
                    </select>

            <button type="button" class="btn btn-primary btn-sm " data-toggle="collapse" data-target="#newClass">Create New Class</button>
        </div>

    </div>

<div class="form-group collapse" id="newClass" >
    <div class="col-md-8">
        <div class="input-group">

            <span class="input-group-addon">New Class</span>

            {{ Form::text( "newclass" , null, array( 'class'=>'form-control addClassInput' , 'placeholder'=>'add a class' ) ) }}


        </div>
    </div>
    <div class="col-md-4">
        <button type="button" class="btn btn-primary btn-sm classSubmit" >add</button>
    </div>
</div>


    <div class="form-group">
        <div class="input-group">

            <span class="input-group-addon">Layout</span>




         {{Form::select('layouts_id',$layouts, Input::old( "layouts_id", $item->layouts_id ), array( 'class'=>'form-control chosen-select') )}}
        </div>
    </div>

<div class="form-group">
    <div class="input-group">





    <div class="col-md-1"></div>
    <button type="button" data-model="Containers" data-relation="columns" data-instance="{{$item->id}}" data-related=""   class="btn btn-primary btn-sm attacher">Add a column</button>

    </div>
</div>

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Columns Attached to this Page</div>
    <div class="panel-body">

    </div>

    <!-- Table -->
    <table  class="table loadable">
        <thead>
        <tr>

            <th>Column</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php

        $cl=array(null=>'--');
        $classes = HugoKalidas\FlexCms\ElementClasses\ElementClasses::lists('html_class','id');

       // $classes=array_merge($cl,$classes);

        ?>


        @if ($item->columns()->count())
        @foreach ($item->columns()->get() as $column)
        <tr>
            <td>{{$column->order}}</td>
            <td><button type="button" data-model="Containers" data-relation="columns" data-instance="{{$item->id}}" data-related="{{$column->id}}"  class="btn btn-danger btn-sm detacher">Detach column</button></td>
            <td> {{ Form::select( "colClasses" ,$classes, null , array( 'class'=>'form-control chosen-select chosenDataTrigger'  ) ) }}</td>
            <td><button type="button" data-model="Columns" data-relation="classes" data-instance="{{$column->id}}" data-related=""  class="btn btn-primary btn-sm attacher">Add Class</button></td>
        </tr>
        <tr>
            @if($column->classes()->count())


                @foreach ($column->classes()->get() as $class)
                    <tr>
                        <td>Html Class</td>
                        <td>{{$class->html_class}}</td>
                        <td><button type="button" data-model="Columns" data-relation="classes" data-instance="{{$column->id}}" data-related="{{$class->id}}"  class="btn btn-danger btn-sm detacher glyphicon glyphicon-remove"> </button></td>
                        <td></td>
                    </tr>
                @endforeach

            @endif
        </tr>
        @endforeach
        @else
        <tr>
            <td>No Columns yet</td>

            <td></td>
            <td></td>
        </tr>
        @endif
        </tbody>
    </table>
</div>




@stop
