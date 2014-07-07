@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit Page: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Page Title</span>


            {{ Form::text( "title" , Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}


</div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Page Blocks</span>

        <?php

            $blocks = HugoKalidas\LaravelFlexCms\Blocks\Blocks::lists('title','id');
            $storedBlocks = $item->blocks();
        ?>


        <select multiple="1" class="chosen-select form-control" name="blocksPage[]">
            @foreach ($blocks as $id => $title)
            @if (in_array($id, $storedBlocks->lists('blocks_id') ))
            <option value="{{$id}}" selected>{{$title}}</option>
            @else
            <option value="{{$id}}">{{$title}}</option>
            @endif
            @endforeach
        </select>

        <?php
        //Todo pass the model to the view
        $layouts = HugoKalidas\LaravelFlexCms\Layouts\Layouts::lists('title','id')

        ?>
        <span class="input-group-addon">Page Layout</span>

        {{ Form::select("layouts_id", $layouts,Input::old('layout', $item->layouts_id) , ["class" => "chosen-select form-control"]) }}




        </div>
</div>


<div class="tab-pane" id="tabs" >
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $nlayouts = HugoKalidas\LaravelFlexCms\Layouts\Layouts::with('containers.columns')->get()->toArray();
            $layouts = HugoKalidas\LaravelFlexCms\Layouts\Layouts::lists('id','title')
            ?>
            <div class="form-group">
                <div class="input-group">

                    <span class="input-group-addon">Layout</span>
                    <select name="layout" id="laySel">
                        <option value="" selected>--</option>
                        @foreach ($layouts as $layout => $id)
                        <option value="{{$id}}">{{$layout}}</option>

                        @endforeach
                    </select>


                </div>

            </div>
                    <div class="form-group">
                    <table  class="table">
                        <thead>
                        <tr>
                            <th>Bock Title</th>
                            <th>Container Title</th>
                            <th>Column</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                    {{-- */ $countBlocks = 0;/* --}}
                    @foreach($storedBlocks->get() as $block)
                    {{-- */ $countBlocks++ ;/* --}}
                        <tr>



                                <td>
                                            <span id="block{{$countBlocks}}">{{$block->title}}</span>
                                </td>
                                <td>
                                        <select name="container" id="cont{{$countBlocks}}" class="colSel">
                                            <option value="">--</option>
                                        @foreach($nlayouts as $nlayout)


                                            @foreach ($nlayout['containers'] as $cont)

                                                    <option value="{{ $cont['title'] }}" class="{{ $cont['layouts_id'] }}">{{ $cont['title'] }}</option>


                                            @endforeach


                                        @endforeach
                                        </select>
                                </td>
                            <td>
                                    <select name="columns" id="cols{{$countBlocks}}" class="Sel">
                                            <option value="">--</option>
                                            @foreach($nlayouts as $nlayout)


                                            @foreach ($nlayout['containers'] as $cont)
                                            @foreach ($cont['columns'] as $col)
                                                    <option value="{{ $col['id'] }}" class="{{ $cont['title'] }}">{{ $col['id'] }}</option>
                                            @endforeach




                                            @endforeach


                                            @endforeach
                                        </select>


                            </td>
                           <td>
                            <button type="button" class="btn btn-sm btn-primary" data-page="{{$item->id}}" id="AddColumn{{$countBlocks}}">Add to column</button>
                        </td>




                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                    </div>

        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Blocks Attached to this Page</div>
            <div class="panel-body">

            </div>

            <!-- Table -->
            <table  class="table loadable">
               <thead>
                   <tr>
                       <th>Container Title</th>
                       <th>Block</th>
                       <th>Column</th>
                       <th></th>
                   </tr>
               </thead>
                <tbody>
                @foreach($nlayouts as $nlayout)


                     @foreach ($nlayout['containers'] as $cont)
                        @foreach ($cont['columns'] as $col)
                            {{-- */ $column = HugoKalidas\LaravelFlexCms\Columns\Columns::find($col['id']);  /* --}}
                            @if (!is_null($column))
                                @foreach ($column->blocks()->wherePivot('pages_id','=',$item->id)->get() as $block)
                                    <tr>
                                        <td>{{$cont['title']}}</td>
                                        <td>{{$block->title}}</td>
                                        <td>{{$col['id']}}</td>
                                        <td><button type="button" data-model="Blocks" data-relation="columns" data-instance="{{$block->id}}" data-related="{{$col['id']}}" data-pivotColumn="pages_id" data-pivotValue="{{$item->id}}" class="btn btn-primary btn-sm detacher">Detach</button></td>
                                    </tr>

                                @endforeach
                            @endif
                @endforeach
                    @endforeach
                        @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@stop