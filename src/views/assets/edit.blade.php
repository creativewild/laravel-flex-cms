@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit Assets: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon ">Title</span>
        {{ Form::text( "title" , Input::old( "title", $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>"The asset's name" ) ) }}


        <span class="input-group-addon ">Path</span>
        {{ Form::text( "path" , Input::old( "path", $item->path) , array( 'class'=>'form-control' , 'placeholder'=>url('/').'/...' )) }}
    </div>
</div>
<div class="form-group">

    <div class="input-group">
        <span class="input-group-addon ">Asset Type</span>


        {{ Form::select('type', $item->typeOptions, $item->type, ['class' => 'chosen-select form-control']) }}

        <span class="input-group-addon ">Position</span>


        {{ Form::select('position', $item->positionOptions, $item->position, ['class' => 'chosen-select form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon ">CDN</span>

        {{ Form::checkbox('cdn',  Input::old('cdn'),false,array( 'class'=>'form-control')) }}

        <span class="input-group-addon ">Global</span>
        {{ Form::checkbox('global',  Input::old('global'),true,array( 'class'=>'form-control', 'id'=>'global')) }}

    </div>
</div>
<div class="form-group">
    <div style="display:none" class="input-group assetAssociation">
        <span class="input-group-addon ">Pages</span>
        <?php $pages = HugoKalidas\FlexCms\Pages\Pages::lists('title','id') ?>
        {{ Form::select('AssetsPage[]', $pages, Input::old('AssetsPage[]'), ['multiple' => true, 'class' => 'chosen-select']) }}


        <span class="input-group-addon ">Blocks</span>
        <?php $blocks = HugoKalidas\FlexCms\Blocks\Blocks::lists('title','id') ?>

        {{ Form::select('AssetsBlocks[]', $blocks, Input::old('blocks_id'), ['multiple' => true, 'class' => 'chosen-select']) }}

    </div>

</div>

<div style="display:none" class="form-group fallback">
    <div class="input-group">
        <span class="input-group-addon ">Fallback Path</span>

        {{ Form::text('fallback_path',  Input::old('fallback_path',$item->fallback_path),array( 'class'=>'form-control')) }}

    </div>
    <div class="input-group">
        <span class="input-group-addon ">Fallback Call</span>

        {{ Form::textarea('fallback_call',  Input::old('fallback_call',$item->fallback_call),array( 'class'=>'form-control', 'rows'=>'5')) }}

    </div>


</div>


<div  class="form-group">
    <div class="input-group">
        <span class="input-group-addon ">Edit file:</span>


    @if (in_array($item->type,$item->editable))
    <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit {{$item->type}} : <b><small>{{$item->title}} </small></b>
                <img src="/packages/davzie/laravel-flex-cms/images/ace-logo.png" alt="ace logo" class="pull-right" style="width: 60px"/>
                </h1>
            </div>
    </div>
        <div class="panel-body" id="aceFrame">
        <div  id="editor" style="height: 700px; max-width:80% ">

        <?php echo htmlspecialchars(file_get_contents($item->path, FILE_USE_INCLUDE_PATH)); ?>
    </div>

    <script src="/packages/davzie/laravel-flex-cms/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");

        //
        //editor.getSession().setMode("ace/mode/javascript");
        //editor.getSession().setMode("ace/mode/php");
        var filePath = "{{$item->path}}";

        {{-- */  $ext = pathinfo($item->path, PATHINFO_EXTENSION);  /* --}}

         var fileExt= "{{$ext}}";

        switch(fileExt) {
            case "css":
                editor.getSession().setMode("ace/mode/css");
                break;
            case "html":
                editor.getSession().setMode("ace/mode/html");
            case "js":
                editor.getSession().setMode("ace/mode/javascript");
            case "php":
                editor.getSession().setMode("ace/mode/php");
                break;
            default:
                editor.getSession().setMode("ace/mode/css");
        }

    </script>
    </div>
    @endif
    <button id="saveFile" type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-file"></span> Save File</button>
    </div>
</div>

<script>

</script>
@stop