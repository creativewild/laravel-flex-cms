
<style type="text/css">

    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }


</style>

<div id="owl-container" class="owl-carousel">
    @foreach($item->uploads as $upload)
    <div class="item"><img src="{{ $upload->sizeImg( 200 , 150 , false ) }}" alt="{{$item->name}}"></div>

    @endforeach
</div>
