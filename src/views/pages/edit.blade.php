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


        <span class="input-group-addon">Page Key</span>

            {{ Form::text( "key" , Input::old( "key", $item->key ) , array( 'class'=>'form-control' , 'placeholder'=>'Page Key' ) ) }}

    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Title En</span>


        {{ Form::text( "title_en" , Input::old( "title_en" , $item->title_en ) , array( 'class'=>'form-control' , 'placeholder'=>'English Title' ) ) }}




    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Title Es</span>

        {{ Form::text( "title_es" , Input::old( "title_es" , $item->title_es ) , array( 'class'=>'form-control' , 'placeholder'=>'Spanish Title' ) ) }}




    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Title Cn</span>


        {{ Form::text( "title_cn" , Input::old( "title_cn" , $item->title_cn ) , array( 'class'=>'form-control' , 'placeholder'=>'Chinese Title' ) ) }}




    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">HTML ID#</span>

            {{ Form::text( "html_ID" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>'Page Container ID' ) ) }}

        <span class="input-group-addon">Keywords</span>

            {{ Form::text( "keywords" , Input::old( "keywords" , $item->keywords ) , array( 'class'=>'form-control rich' , 'placeholder'=>'keywords1, keyword2' ) ) }}

    </div>
</div>
<div class="form-group">
    <div class="input-group">

        <span class="input-group-addon">Description</span>

            {{ Form::textarea( "description" , Input::old( "description" , $item->description ) , array( 'class'=>'form-control' , 'placeholder'=>'content description meta', 'rows'=>'2' ) ) }}

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

@stop
@section('tabs')

<div class="tab-pane" id="tabs">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $nlayouts = HugoKalidas\LaravelFlexCms\Layouts\Layouts::with('containers.columns')->get()->toArray();
            $layouts = HugoKalidas\LaravelFlexCms\Layouts\Layouts::lists('title','id')
            ?>
            <div class="form-group">
                <div class="input-group">

                    <span class="input-group-addon">Layout</span>
                    {{ Form::select("layout", $layouts,Input::old('layout', $item->layouts_id) , ["class" => "chosen-select form-control",'id'=>'laySel','disabled'=>1]) }}


                </div>

            </div>
                    <div class="form-group">
                    <table  class="table">
                        <thead>
                        <tr>
                            <th>Block Title</th>
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
                                                    <option value="{{ $col['id'] }}" class="{{ $cont['title'] }}">{{$col['order'] }}</option>

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
                                        <td>{{$col['order']}}</td>
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