<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- Bootstrap core CSS -->
        @section('css')
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-flex-cms/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-flex-cms/css/styles.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-flex-cms/css/jquery.tagsinput.min.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-flex-cms/css/redactor.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-flex-cms/css/chosen.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('packages/davzie/laravel-flex-cms/menu/css/normalize.css') }}"/>
            <link rel="stylesheet" type="text/css" href="{{ asset('packages/davzie/laravel-flex-cms/menu/css/demo.css') }}"/>
            <link rel="stylesheet" type="text/css" href="{{ asset('packages/davzie/laravel-flex-cms/menu/css/component.css') }}"/>

            <script src="{{ asset('packages/davzie/laravel-flex-cms/menu/js/modernizr.custom.js') }}"></script>
        @show

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body class="interface">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <ul id="gn-menu" class="gn-menu-main">

                    <li class="gn-trigger">
                        <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                        <nav class="gn-menu-wrapper">
                            <div class="gn-scroller">
                                <ul class="gn-menu">

                                    <li class="gn-search-item">
                                        <input placeholder="Search" type="search" class="gn-search">
                                        <a class="gn-icon gn-icon-search"><span>Search</span></a>
                                    </li>

                                    @if($menu_items)

                                        @foreach($menu_items as $url=>$item)
                                            @if ($item['editor'])
                                            <li>
                                                <a  href="{{ url( $urlSegment.'/'.$url ) }}">
                                                    <span class="menu_item glyphicon glyphicon-{{ $item['icon'] }}"></span> {{ $item['name'] }}
                                                </a>
                                            </li>
                                            @endif
                                        @endforeach

                                    @endif

                                </ul>
                            </div><!-- /gn-scroller -->
                        </nav>
                    </li>

                    @if($menu_items)
                        @foreach($menu_items as $url=>$item)
                            @if( $item['top'] and ($item['editor'] or Auth::User()->id==3))
                            <li class=" {{ Request::is( "$urlSegment/$url*" ) ? 'active' : '' }} ">
                            <a  class="top_menu" href="{{ url( $urlSegment.'/'.$url ) }}"> <span class=" glyphicon glyphicon-{{ $item['icon'] }}"></a>
                            </li>
                            @endif
                        @endforeach

                    @endif
                    <li class=".top_menu">
                        <a href="/">{{ $app_name }}</a>
                    </li>

                </ul>





            </div><!-- /.container -->

        </div><!-- /.navbar -->

        <div class="container">
            <div class="row" >


                <div class="col-sm-12" id="formContainer">
                    @yield('content')
                </div>

            </div>
        </div>

        <div class="container">
            <hr>
            <footer>
                <p>&copy; {{ $app_name }} {{ date('Y') }}</p>
            </footer>
        </div><!--/.container-->

        {{-- */ $path = Request::segment(1)."/".Request::segment(2)."/".Request::segment(3);  /* --}}
        {{\Kint::dump($path)}}
        <script>

            appUrl='{{$appUrl}}';
        </script>

        @section('scripts')
            <script src="{{ asset('packages/davzie/laravel-flex-cms/js/jquery.js') }}"></script>
            <script src="{{ asset('packages/davzie/laravel-flex-cms/js/bootstrap.min.js') }}"></script>
             <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
            <script src="{{ asset('packages/davzie/laravel-flex-cms/js/jquery.tagsinput.min.js') }}"></script>
        {{-- <script src="{{ asset('packages/davzie/laravel-flex-cms/js/redactor.min.js') }}"></script>--}}
             <script src="{{asset('packages/davzie/laravel-flex-cms/js/ckeditor/ckeditor.js')}}"></script>
             <script src="{{ asset('packages/davzie/laravel-flex-cms/js/chosen.jquery.min.js') }}"></script>

        <script src="{{ asset('packages/davzie/laravel-flex-cms/js/cms/main.js') }}"></script>


        <?php
        //Todo pass the model
        $elClasses = HugoKalidas\FlexCms\ElementClasses\ElementClasses::lists('html_class','id');

        ?>

        <!-- Add columns to containers -->
        <script>

            $('#global').click(function() {
                $(".assetAssociation").toggle(!this.checked);
            });

            $('#cdn').click(function() {
                $(".fallback").toggle(this.checked);
            });

            $('#addColumn').click(function() {

                $(".columnContainer").append("<input type='text' name='column'>");
            });


            $(init);

            function init() {
                $('#colDraggable').draggable( {
                    cursor: 'move',
                    containment: 'document',
                    helper: ""
                } );
            }

            function myHelper(  ) {
                var formDrag='{{ Form::select("cols[]", array("default" => "column") +  $elClasses, "default" , ["multiple" => true, "class" => "chosen-select"]) }}';

                return formDrag;
            }

            function countC(){

                if(typeof countCols === 'undefined'){

                    countCols=<?php echo (isset($countCols)) ? $countCols : 1; ?>;
                }else{
                    countCols++;
                }

                return countCols;
            }

            $('#dropContainer').droppable( {


                drop: function(event, ui) {


                    var newDiv = myHelper();

                    var contc = countC();
                    colLabel = "<p> Column "+contc+ "</p>";

                    var cl = 'name="cols';
                    newDiv=newDiv.replace(cl,cl+contc);

                    $("#dropContainer").append(colLabel);
                    $("#dropContainer").append(newDiv);

               // $(".chosen-select").chosen({width: "95%"});
            }
            } );

            $('#newContainerBtn').click(function() {
               $.get('/admin/containers/new', function(data){
                    $(data).find("#newContainer").appendTo("#ajaxLoad");
                });


            });



        </script>

        <script src="{{ asset('packages/davzie/laravel-flex-cms/menu/js/classie.js') }}"></script>
        <script src="{{ asset('packages/davzie/laravel-flex-cms/menu/js/gnmenu.js') }}"></script>
        <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
        </script>
        @if ((Request::segment(2)=="assets" and Request::segment(3)=="edit"))


        {{--
        <script>

            saveFile = function() {

            var contents = editor.getSession().getValue();



            $.post("/admin/saveAsset",
                 {contents: contents,filepath:filePath},
             function() {
             // todo add error checking
             alert('successful save');
             }
             );
            };
            $(document).ready(function() {
                
                $("#saveFile").click(function (event) {
                    event.preventDefault();
                    saveFile();
                });
            });
        </script>

        --}}
        @endif
        @if ((Request::segment(2)=="pages" and Request::segment(3)=="edit") or (Request::segment(2)=="blocks" and is_null(Request::segment(3))) )
        <!-- Todo change source-->
        <script src="http://www.appelsiini.net/download/jquery.chained.js"></script>
        <script>

            $(document).ready(function() {

                $(".colSel").chained("#laySel");
                $("#laySel").chosen({
                    width: '40%'
                })

                $(".colSel,#laySel,.Sel").chosen({
                    width: '95%'
                })

                $('.colSel, #laySel').on('change', function () {
                    $('.colSel, #laySel').trigger('chosen:updated');
                });


            });



        </script>

        @if ((Request::segment(2)=="pages" and Request::segment(3)=="edit"))

        <!-- Todo refactor -->
        @for($i=1;$i<=$countBlocks;$i++)

        <script type="text/javascript">
            $("#cols{{$i}}").chained("#cont{{$i}}");

            $("#cont{{$i}},#cols{{$i}}").on('change', function () {
                $("#cont{{$i}},#cols{{$i}}").trigger('chosen:updated');
            });

            $("#AddColumn{{$i}}").click(function (event) {
                var blockName = $("#block{{$i}}").html();
                var column = $("#cols{{$i}}").val();
                var page =  $(this).data("page");

                if (column.length > 0) {
                    var postData = { "postData" : [
                        {"blockName":blockName},
                        {"column":column},
                        {"page":page}
                    ]
                    }
                    $.ajax({
                        type: 'POST',
                        url: '/add-column',
                        data: postData,

                        cache: false,
                        success: function(data) {
                            alertSuccess()


                        },
                        error:function (xhr, ajaxOptions, thrownError){
                            console.log('error...', xhr);
                            alertDanger()
                        },
                        complete: function(){
                            //afer ajax call is completed
                        }
                    });
                }
                else {
                    alert("Nothing Selected");
                }


            });


        </script>
        @endfor
        @endif

        {{--
        <script>

            $(document).ready(function() {

                $( document ).on( "click", ".detacher", function() {
                    var postData =  { "postData" :
                        $(this).data()
                    };



                    $.ajax({
                        type: 'POST',
                        url: '/detach-column',
                        data: postData,
                        cache: false,
                        success: function(data) {
                            alertSuccess();
                        },
                        error:function (xhr, ajaxOptions, thrownError){
                            console.log('error...', xhr);
                            alertDanger()
                        },
                        complete: function(){
                            //afer ajax call is completed
                        }
                    });
                });



            });


        </script>

        --}}

        @endif


        @show
    </body>
</html>