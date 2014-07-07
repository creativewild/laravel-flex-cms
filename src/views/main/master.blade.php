<!doctype html>
<!-- Todo Dynamic Assigment -->
<html lang="en">
<head>
	@include('laravel-flex-cms::main.includes.head') <!-- IncluDES dOCUMENT hEAD-->

</head>
<body>

                <!-- Navigation-->
                @include('laravel-flex-cms::main.includes.navigation')

                <!-- Todo if Jumbotron -->
                <!-- Content-->

                    @yield('grid')
                    @yield ('single')

                <!-- Footer-->
    @include('laravel-flex-cms::main.includes.footer')
                <!-- Magic-->
	@include('laravel-flex-cms::main.includes.scripts')
</body>
</html>