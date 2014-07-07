

<div id="carousel" class="carousel slide containerTop" data-ride="carousel">
    <ol class="carousel-indicators">
    @for ($i=0;$i<$jumbo->posts()->count();$i++)
        @if($i==0)
        <li data-target="#carousel" data-slide-to="{{$i}}" class="active"></li>
        @else
        <li data-target="#carousel" data-slide-to="{{$i}}" ></li>
        @endif
    @endfor
    </ol>
    <?php $count=0?>
    <div class="carousel-inner">
    @foreach ($jumbo->posts()->get() as $slide)
        @if($slide->uploads()->count())
        @if ($count==0)
        <div class="item active">
        @else
        <div class="item">
        @endif

            <img src="/uploads/posts/{{$slide->id}}/{{{$slide->uploads()->get()[0]->filename or foo}}}" alt="Slide {{$count}}">

        </div>


            <?php $count++?>
        @endif
    @endforeach

    </div>
    <a href="#carousel" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a href="#carousel" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

    <!-- /.carousel -->
