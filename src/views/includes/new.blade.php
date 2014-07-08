@extends('laravel-flex-cms::layouts.interface-new')

@section('title')
    Add Assets
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        {{ Form::label( "title" , 'Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title" ) , array( 'class'=>'form-control' , 'placeholder'=>"The asset's name" ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "path" , 'Path' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::file( "file" , Input::old( "Path" ) , array( 'class'=>'form-control' , 'placeholder'=>url('/').'/...' )) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "type" , 'Type' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-4">

            {{-- */  $item = HugoKalidas\LaravelFlexCms\Assets\Assets::find(4); /* --}}
            {{ Form::select('postsBlock', $item->typeOptions, Input::old('posts_id'), ['class' => 'chosen-select']) }}
        </div>
        {{ Form::label( "position" , 'Position' , array( 'class'=>'col-lg-1 control-label' ) ) }}
        <div class="col-lg-4">


            {{ Form::select('position', $item->positionOptions, Input::old('position'), ['class' => 'chosen-select']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "cdn" , 'CDN' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-1">

            {{ Form::checkbox('cdn',  Input::old('cdn'),false,array( 'class'=>'form-control')) }}

        </div>
            {{ Form::label( "global" , 'Global' , array( 'class'=>'col-lg-1 control-label' ) ) }}
        <div class="col-lg-1">

            {{ Form::checkbox('global',  Input::old('global'),true,array( 'class'=>'form-control', 'id'=>'global')) }}

        </div>

        <div style="display:none" class="col-lg-3 assetAssociation">

            <?php $pages = HugoKalidas\LaravelFlexCms\Pages\Pages::lists('title','id') ?>
            {{ Form::select('AssetsPage[]', $pages, Input::old('AssetsPage[]'), ['multiple' => true, 'class' => 'chosen-select']) }}
        </div>
        <div style="display:none" class="col-lg-4 assetAssociation">

            <?php $blocks = HugoKalidas\LaravelFlexCms\Blocks\Blocks::lists('title','id') ?>

            {{ Form::select('AssetsBlocks[]', $blocks, Input::old('blocks_id'), ['multiple' => true, 'class' => 'chosen-select']) }}

        </div>

    </div>

    <div style="display:none" class="form-group fallback">
        {{ Form::label( "fallback_path" , 'Fallback Path' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-6">

            {{ Form::text('fallback_path',  Input::old('fallback_path'),array( 'class'=>'form-control')) }}

          </div>
    {{ Form::label( "fallback_call" , 'Fallback Call' , array( 'class'=>'col-lg-1 control-label' ) ) }}
    <div class="col-lg-3">

        {{ Form::textarea('fallback_call',  Input::old('fallback_call'),array( 'class'=>'form-control', 'rows'=>'5')) }}

    </div>

    <div style="display:none" class="col-lg-7 assetAssociation">

        <p>foo</p>

    </div>

</div>

@stop