@extends('laravel-flex-cms::main.master')
@section('single')





<div class="container singleContainer">
    <!-- Example row of columns -->

    <div class="row">
        <div class = "col-md-8 articleWrapper">
            {{-- */ $classStr=""; /* --}}
            @foreach ($post->classes()->get() as $class)

            {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
            @endforeach
            <article class="{{$classStr}}">
                <div class="articleContainer">
                    @if($lang!='pt')
                    {{-- */ $titlevar='title_'.$lang  /* --}}
                    @else
                    {{-- */ $titlevar='title' /* --}}
                    @endif

                    <h2>{{{ !empty($post->$titlevar) ? $post->$titlevar : $post->title }}}</h2>

                    <div class="contentContainer">
                        @if($lang=='pt' or empty($post->$lang))
                        {{-- */ $content=$post->content  /* --}}
                        @else
                        {{-- */ $content=$post->$lang  /* --}}
                        @endif
                        {{$content}}
                    </div>

                </div>
            </article>
        </div>

        @if ($pubPosts)
         <div class = "col-md-4 pubWrapper">

            @foreach ($pubPosts as $post)
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
        @endif

    </div>

</div>





@stop
