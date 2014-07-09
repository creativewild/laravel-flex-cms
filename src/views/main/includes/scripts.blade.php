<!-- Todo loop Footer top  -->
{{HTML::script('https://code.jquery.com/jquery.js')}}
{{HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js')}}
{{HTML::script(asset('packages/hugo-kalidas/laravel-flex-cms/js/bootstrap.js'))}}

@if (isset ($gallery))

<script src="/js/jquery.blueimp-gallery.min.js"></script>
<script src="/js/bootstrap-image-gallery.min.js"></script>

@endif

@if (isset($prettyPhoto))
{{HTML::script('http://cdn.jsdelivr.net/prettyphoto/3.1.5/js/jquery.prettyPhoto.js')}}

<script>
    $(document).ready(function () {
        $("a[rel^='prettyPhoto']").prettyPhoto();
    });
</script>

@endif

@if (isset($owl))
{{HTML::script('http://cdn.jsdelivr.net/jquery.owlcarousel/1.31/owl.carousel.min.js')}}

<script>
    $(document).ready(function () {
        $(".owl-slider").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });
    });
</script>
@endif


<!-- Todo loop Footer bottom  -->

<!-- Todo Calls  -->

