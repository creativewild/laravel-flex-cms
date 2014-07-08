@extends('laravel-flex-cms::main.master')
	@section('grid')

{{-- */ $containers = $page->layouts()->first()->containers()->get() ; /* --}}


@foreach ($containers as $container)
    {{-- */ $classStr=""; /* --}}
    @foreach ($container->classes()->get() as $class)
        {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
    @endforeach

    <div class="{{$classStr}}">

        <div class="row">

            @foreach ($container->columns()->get() as $column)
                    {{-- */ $classStr=""; /* --}}
                @foreach ($column->classes()->get() as $class)
                    {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
                @endforeach

                <div class="{{$classStr}}">

                @foreach ($column->blocks()->wherePivot('pages_id','=',$page->id)->get() as $block)
                        {{-- */
                    if ($block->type=="Recent") {
                    $posts=HugoKalidas\LaravelFlexCms\Posts\Posts::where('type','=','article')->orderBy('created_at','DESC')->get();
                    }
                    else $posts = $block->posts()->get();

                    /* --}}

                    @if ($block->type=="Jumbotron")
                        {{-- */ $jumbo=$block /* --}}
                        @include('laravel-flex-cms::main.includes.jumbotron')
                    @elseif (!is_null($block->containers_id) )
                        {{-- */$countPosts=0; $cols = $block->containers()->first()->columns();$colsCount=$cols->count();$colsTotal = $colsCount;$cols=$cols->get()  /* --}}


                        @foreach ($posts as $post)
                            @if ($colsTotal)
                                @if ($colsCount == $colsTotal )
                                    <div class="row subRow">
                                @endif
                                {{-- */$colsCount -- /* --}}
                                {{-- */ $classCol=""; /* --}}
                                @foreach ($cols[$colsCount]->classes()->get() as $class)

                                    {{-- */ $classCol=$classCol." ".$class->html_class /* --}}
                                @endforeach
                            @endif

                            <div class="{{$classCol or 'col-md4'}} subRowCol">


                                {{-- */ $classStr=""; /* --}}
                                @foreach ($post->classes()->get() as $class)
                                @if ($class->html_class == "video" or $class->html_class == "article")
                                {{-- */ $articleClass = $class->html_class /* --}}
                                @endif
                                {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
                                @endforeach

                                <article class="{{$classStr}} subRowArticle">
                                    <div class="articleContainer">
                                        @if($lang!='pt')
                                        {{-- */ $titlevar='title_'.$lang  /* --}}
                                        @else
                                        {{-- */ $titlevar='title' /* --}}
                                        @endif




                                        @if (isset($articleClass) and $articleClass != "video")
                                        <h2><a href="/{{$lang}}/{{$post->slug}}">{{{ !empty($post->$titlevar) ? $post->$titlevar : $post->title }}}</a></h2>
                                        @endif


                                        <div class="contentContainer">

                                            @if($lang=='pt' or empty($post->$lang))
                                                {{-- */ $content=$post->content  /* --}}
                                            @else
                                                {{-- */ $content=$post->$lang  /* --}}
                                            @endif

                                            @if ($truncate and $post->truncate)
                                              {{HugoKalidas\LaravelFlexCms\Utilities\Utilities::truncateHtml( $content,$post->truncate_length)}}
                                                 @if (isset($articleClass) and  $articleClass != "video")
                                                    <a class="saibaMais" href="/{{$lang}}/{{$post->slug}}">{{$saiba}}</a>
                                                    @else
                                                    <a class="saibaMais" href="/{{$lang}}/{{$post->slug}}">{{$video}}</a>
                                                 @endif
                                            @else
                                                  {{$content}}

                                            @endif

                                        </div>

                                        @if (isset($articleClass) and  $articleClass == "video")
                                        <h2><a href="/{{$lang}}/{{$post->slug}}">{{{ !empty($post->$titlevar) ? $post->$titlevar : $post->title }}}</a></h2>
                                        @endif

                                    </div>
                                </article>




                            </div>

                            @if ($colsTotal and !$colsCount )
                                {{-- */$colsCount = $colsTotal  /* --}}
                                        </div>
                            @endif
                        @endforeach
                    @else
                        @foreach ( $posts as $post)

                            {{-- */ $classStr=""; /* --}}
                            @foreach ($post->classes()->get() as $class)
                                @if ($class->html_class == "video" or $class->html_class == "article")
                                     {{-- */ $articleClass = $class->html_class /* --}}
                                @endif
                                {{-- */ $classStr=$classStr." ".$class->html_class /* --}}
                            @endforeach

                            <article class="{{$classStr}}">
                                <div class="articleContainer">

                                    @if($lang!='pt')
                                    {{-- */ $titlevar='title_'.$lang  /* --}}
                                    @else
                                    {{-- */ $titlevar='title' /* --}}
                                    @endif




                                    @if (isset($articleClass) and $articleClass != "video")
                                        <h2><a href="/{{$lang}}/{{$post->slug}}">{{{ !empty($post->$titlevar) ? $post->$titlevar : $post->title }}}</a></h2>
                                    @endif
                                    <div class="contentContainer">
                                        <a class="linkable" href="/{{$lang}}/{{$post->slug}}">
                                        @if($lang=='pt' or empty($post->$lang))
                                           {{-- */ $content=$post->content  /* --}}
                                        @else
                                            {{-- */ $content=$post->$lang  /* --}}
                                            @endif

                                          @if ($truncate and $post->truncate)
                                              {{HugoKalidas\LaravelFlexCms\Utilities\Utilities::truncateHtml( $content,$post->truncate_length)}}
                                                 @if (isset($articleClass) and  $articleClass != "video")
                                                 <a class="saibaMais" href="/{{$lang}}/{{$post->slug}}">{{$saiba}}</a>
                                                 @else
                                                 <a class="saibaMais" href="/{{$lang}}/{{$post->slug}}">{{$video}}</a>
                                                 @endif
                                            @else
                                                  {{$content}}

                                            @endif
                                         </a>
                                    </div>

                                     @if (isset($articleClass) and  $articleClass == "video")
                                        <h2><a href="/{{$lang}}/{{$post->slug}}">{{{ !empty($post->$titlevar) ? $post->$titlevar : $post->title }}}</a></h2>
                                     @endif

                                </div>
                            </article>


                        @endforeach
                    @endif

                @endforeach

                </div>
            @endforeach
        </div>

    </div>








@endforeach
</div>
@stop
