@extends('laravel-flex-cms::layouts.interface')

@section('title')
    Edit Assets: {{ $item }}
@stop

@section('heading')

@stop

@section('content')





<div  class="form-group">
    <div class="input-group">
        <span class="input-group-addon ">Edit file:</span>



    <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit {{$item}}</b>
                <img src="/packages/hugo-kalidas/laravel-flex-cms/images/ace-logo.png" alt="ace logo" class="pull-right" style="width: 60px"/>
                </h1>
            </div>
    </div>
        <div class="panel-body" id="aceFrame">
        <div  id="editor" style="height: 700px; max-width:80% ">

        <?php echo htmlspecialchars(file_get_contents($path, FILE_USE_INCLUDE_PATH)); ?>
    </div>

    <script src="/packages/hugo-kalidas/laravel-flex-cms/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");

   	editor.getSession().setMode("ace/mode/php");
        var filePath = "{{$path}}";

       

       

    </script>
    </div>

    <button id="saveFile" type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-file"></span> Save File</button>
    </div>
</div>

<script>

</script>
@stop
