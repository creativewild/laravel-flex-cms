
{{-- */
$images=$post->uploads()->get(); $owl=true; $prettyPhoto=true;
/* --}}

<div class="owlContainer">
    <div class="owl-slider">
        @foreach ($images as $image)
        <a class="item" href="/uploads/posts/{{$post->id}}/{{$image->filename}}"  rel="prettyPhoto" title="{{$post->title}}">
            <img src="/uploads/posts/{{$post->id}}/{{$image->filename}}" width="300" height="150" alt="{{$post->title}}" />
        </a>

        @endforeach
</div>
</div>

