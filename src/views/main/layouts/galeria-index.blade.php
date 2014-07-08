@extends('laravel-flex-cms::main.master')
@section('single')





<div class="container singleContainer">
    <!-- Example row of columns -->

    <div class="row">
        <div class = "col-md-8 articleWrapper">
            {{-- */ $classStr=""; /* --}}
            @foreach ($destaque->classes()->get() as $class)

            {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
            @endforeach
            <article class="{{$classStr}}">
                <div class="articleContainer">
                    {{-- Todo pass to controller (make it a foreach title content) --}}
                    @if($lang!='pt')
                    {{-- */ $titlevar='title_'.$lang  /* --}}
                    @else
                    {{-- */ $titlevar='title' /* --}}
                    @endif
                    <h2>{{{ !empty($destaque->$titlevar) ? $destaque->$titlevar : $destaque->title }}}</h2>
                    @if($lang=='pt' or empty($destaque->$lang))
                    {{-- */ $content=$destaque->content  /* --}}
                    @else
                    {{-- */ $content=$destaque->$lang  /* --}}
                    @endif
                    <div class="contentContainer">
                        {{$content}}
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

<div class="container galleryContainer">
<div class="row">
<div class="galerias">
        @foreach ($galleries as $gallery)
         @if ($gallery->uploads()->count())
            <div class="col-md-4">
			<div class="contentGalerias">

                <a href="/{{$lang}}/galeria/{{$gallery->id}}">
                <div class="contentContainer">

                    <img src="/uploads/galleries/{{$gallery->id}}/{{$gallery->uploads()->get()[0]->filename}}">

                </div>
                </a>
                {{HugoKalidas\LaravelFlexCms\Utilities\Utilities::truncateHtml( $gallery->description,120)}}
				</div>
            </div>
           @endif
        @endforeach
		</div>
		</div>
</div>

@stop