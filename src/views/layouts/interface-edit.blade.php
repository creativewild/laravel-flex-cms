@extends('laravel-flex-cms::layouts.interface')

@section('content')
    
    @if( isset($uploadable) and $uploadable )
        <div class="row">
            <div class="col-12 col-lg-8 col-md-8">
    @endif
            @yield('heading')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1><a href="/{{$urlSegment}}/{{$model}}"  class="glyphicon glyphicon-{{ $menu_items[$model]['icon'] }} back_link"> </a> Edit {{ucwords(rtrim($model,"s"))}}: <small>{{ $item->title }}</small></h1>
                    </div>
                </div>
            {{-- The menu partial --}}
            @include('laravel-flex-cms::partials.edit-menu')

            {{ Form::open( array( 'url'=>$edit_url.$item->id , 'class'=>'form-horizontal form-top-margin' , 'role'=>'form', 'id'=>'item-form' ) ) }}

                {{-- The error / success messaging partial --}}
                @include('laravel-flex-cms::partials.messaging')

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            @yield('form-items')
                            </div>
                        </div>
                    </div>
                    @include('laravel-flex-cms::partials.images')
                    @include('laravel-flex-cms::partials.tagging')
                    @yield('tabs')
                </div>


                {{ Form::submit('Save Item' , array('class'=>'btn btn-large btn-primary pull-right')) }}
                <a class="btn btn-large btn-primary pull-right" href="/{{$urlSegment}}/{{$model}}">Cancel</a>
            {{ Form::close() }}

        @if( isset($uploadable) and $uploadable )
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <h4>Upload Item Images</h4>
                    <p>Drag and drop images into the box below or simply click it to select files to upload</p>
                    <p><strong>Note: </strong>This will also save and refresh this page.</p>
                    {{ Form::open( [ 'url' => $object_url.'/upload/'.$item->id , 'class' => 'dropzone square' , 'id'=>'imageUploads' , 'files'=>true ] ) }}
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        @endif

@stop

@section('scripts')
    @parent
    @if( isset($uploadable) and $uploadable )
        <script src="{{ asset('packages/hugo-kalidas/laravel-flex-cms/js/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ asset('packages/hugo-kalidas/laravel-flex-cms/js/jquery-ui.js') }}"></script>
        <script>
            $(document).ready(function(){

                // Setup some options for our Dropzone
                Dropzone.options.imageUploads = {
                    maxFilesize: 5,
                    init: function(){

                        // When a file has completed uploading, check to see if others are queueing, if not then submit the form
                        // which saves all changes and then gets us back to the edit page
                        this.on("complete", function(file){

                            if( this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0 ){
                                // Submit dat form
                                $('#item-form').submit();
                            }

                        });
                        this.on('sending',function(){
                            $('div.dz-default.dz-message').remove();
                        });

                    }
                };

                if( $( "#item-media" ).length ){

                    $( "#item-media" ).sortable({
                        stop: function(){
                            var items = new Array();
                            // Get all of the items in the array and add the key and element to the items thing
                            $('#item-media > div').each(function( key , elem ){
                                items[key] = $(elem).attr('upload-id');
                            });

                            // Post the new ordering off to the order-images functionality
                            $.post("{{ url($object_url.'/order-images') }}", { data:items });

                        }
                    });
                    $( "#item-media" ).disableSelection();

                }
            });
        </script>



    @endif


@stop
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/hugo-kalidas/laravel-flex-cms/js/dropzone/css/dropzone.css') }}">
@stop