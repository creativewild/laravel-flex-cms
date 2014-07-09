<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--
<!-- Todo Dynamic Assigment -->
<title>FunnyShirt</title>
<!-- Todo if from posts class -->
<meta name="description" content="{{$page->description}}" />
<meta name="keywords" content="{{$page->keywords}}" />

<meta name="application-name" content="Laragile CMS" />
<meta name="language" content="PT">
<!-- Todo from settings class -->
<meta name="author" content="" />
<meta name="url" content="{{Config::get('app.url')}}">
<meta name="identifier-URL" content="{{Config::get('app.url')}}">
<!--  if category -->
<meta name="category" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">

<meta name="og:title" content="{{$page->title}}"/>
<meta name="og:type" content="Article"/>
<meta name="og:url" content="{{Request::url()}}"/>
<meta name="og:image" content="http://ia.media-imdb.com/rock.jpg"/>
<meta name="og:site_name" content=""/>
<meta name="og:description" content="{{$page->description}}"/>

--}}
<!-- Todo favicon from Assets class -->
<link rel="shortcut icon" href="favicon.ico">

<!-- loop head top Assets -->


{{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/bootstrap.css'))}}
{{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/main.css'))}}
{{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/font-awesome.min.css'))}}
@if (isset($customStyle))

    {{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/'.$customStyle))}}
@endif
@if (isset($gallery))

<link rel="stylesheet" href="/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="/css/bootstrap-image-gallery.min.css">
@endif

@if ( $tabsl)
    {{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/vertical-tabs.css'))}}
    {{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/prettyPhoto.css'))}}
    {{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/owl.carousel.css'))}}
    {{HTML::style(asset('packages/hugo-kalidas/laravel-flex-cms/css/owl.theme.css'))}}

@endif

{{HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
{{HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}

<!-- loop head bottom Assets -->

