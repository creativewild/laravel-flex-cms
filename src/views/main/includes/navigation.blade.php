
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-brand">
      <a href="/{{$lang}}/home-page">
        <img src="/packages/hugo-kalidas/laravel-flex-cms/images/logo.png" />
      </a>
    </div>

    <div class="anuncioEspaco">
      <img src="/images/anuncio.jpg" alt="" title="" />
    </div>

    <div class="frase">
      <a>Encontre o que procura com facilidade</a>
    </div>

  </div>
  <div class="cont">
      <div class="container">
    <div class="collapse navbar-collapse">

      <ul class="nav navbar-nav">
        <?php $count=0?>
        @foreach ($menuItems as $menuPage)
        <?php $count++?>
        <!--<li class="active"><a href="#">Home</a></li>-->
          
          @if($lang!='pt')
          {{-- */ $titlevar='title_'.$lang  /* --}}
          @else
          {{-- */ $titlevar='title' /* --}}
          @endif
    
        @if ($count==2)
          @if($lang=='pt' or $lang=='cn')
          
          <li>
            <a href="/{{ Request::segment(1)}}/quem-somos">Quem Somos</a>
          </li>
          @elseif($lang=='en')
           <li>
            <a href="/{{ Request::segment(1)}}/contactos">About Us</a>
          </li>

          @else
           <li>
            <a href="/{{ Request::segment(1)}}/contactos">Nosotros</a>
          </li>

          @endif
     
        <li>
        <a href="/{{ Request::segment(1)}}/{{$menuPage->key}}">{{{ !empty($menuPage->$titlevar) ?  $menuPage->$titlevar :  $menuPage->title }}}</a>
        </li>
        @endif

        @endforeach

          @if($lang=='pt' or 'cn')

          <li>
              <a href="/{{ Request::segment(1)}}/contactos">Contactos</a>
          </li>
          @elseif($lang=='en')
          <li>
              <a href="/{{ Request::segment(1)}}/quem-somos">Contact Us</a>
          </li>

          @else
          <li>
              <a href="/{{ Request::segment(1)}}/quem-somos">Contacto</a>
          </li>

          @endif


      </ul>
    
    </div>
    <!--/.nav-collapse -->
    </div>
  </div>
  <div class="linha"></div>
    <div class="container">
		<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
 
        </div>

    </div>