<footer>
   <div id="footer">
        <div class="linhafooter"></div>
      <div class="footerTop">
        <div class="container">
        <p class="text-muted">Rua da Carvalha, 570 - Aldeamento Sta. Clara . Parceiros - 2410-441 - Leiria</p>
        <p class="text-muted"><span>Tel. 244 000 000 - geral@bidaempresa.pt</span></p>
        <div class="socialNetwork">
        <span>SIGA-NOS</span>
        <a><span class="fa fa-facebook-square"></span></a>
        <a><span class="fa fa-twitter-square"></span></a>
        <a><span class="fa fa-linkedin-square"></span></a>
        <a><span class="fa fa-youtube-square"></span></a>
        <a><span class="fa fa-vimeo-square"></span></a>
        </div>
        </div>
      </div>
          <div class="linhafooter"></div>
        <div class="footerInside">
        <div class="container">
    <div class="collapse navbar-collapse">

      <ul class="nav navfooter">
        @foreach ($menuItems as $menuPage)
        
          <a href="{{$menuPage->key}}">{{$menuPage->title}}</a>
       

        @endforeach
      </ul>
        <p class="copy">BI da Empresa é uma marca registada da Slideshow, Lda - 2014 - Todos os direitos reservados</p>
        <p class="qren" title="Incentivos QREN"></p>
    </div>
    </div>
         </div>
    </div>
</footer>