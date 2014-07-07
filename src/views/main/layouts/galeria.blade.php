@extends('laravel-flex-cms::main.master')
@section('single')




<div class="container singleContainer">


    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Anterior
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Seguinte
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Example row of columns -->

    <div class="row">
        <div class = "col-md-8 articleWrapper">

            <article class="gallerySingle">
                <div class="galleryContainer">

                    <h2>{{$gallery->title}}</h2>
                    {{-- */
                            $images=$gallery->uploads()->get();
                    /* --}}
                    <div class="contentContainer">
                        <img src="/uploads/galleries/{{$gallery->id}}/{{$images[0]->filename}}">
                        {{$gallery->description}}
                        <div id="links">
                        @foreach ($images as $image)

                            <a href="/uploads/galleries/{{$gallery->id}}/{{$image->filename}}"  data-gallery>
                                <img src="/uploads/galleries/{{$gallery->id}}/{{$image->filename}}" class="thumb" alt="">
                            </a>


                        @endforeach
                        </div>
                    </div>

                </div>
            </article>
        </div>
        <div class = "col-md-4 pubWrapper">

            @foreach ($publicidade as $post)
                {{-- */ $classStr=""; /* --}}
                @foreach ($post->classes()->get() as $class)

                    {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
                @endforeach


                <article class="{{$classStr}}">
                    <div class="articleContainer">

                        <h2>{{$post->title}}</h2>

                        <div class="contentContainer">

                            {{$post->content}}
                        </div>


                    </div>
                </article>
            @endforeach
        </div>


    </div>

</div>





@stop