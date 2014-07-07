@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit Post: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Block Title</span>
            {{ Form::text( "title" , Input::old( "title", $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Title' ) ) }}

            <span class="input-group-addon">Block Key</span>

            {{ Form::text( "key" , Input::old( "key", $item->key ) , array( 'class'=>'form-control' , 'placeholder'=>'Block Key' ) ) }}
        </div>
    </div>
    <div class="form-group">
         <div class="input-group">
                <span class="input-group-addon">Block Type</span>

             {{ Form::select( "type" ,$item->typeOptions, Input::old( "type", $item->type ), array( 'class'=>'form-control chosen-select' ) ) }}

            <span class="input-group-addon">Block Container</span>
             <?php $cont = array(null=>'--');
                    $containers=HugoKalidas\LaravelFlexCms\Containers\Containers::lists('title','id');
             $containers[null]= '--';

                 ?>
            {{ Form::select( "containers_id" ,$containers, Input::old( "containers_id", $item->containers_id ), array( 'class'=>'form-control chosen-select' ) ) }}
        </div>
    </div>
    <div class="form-group">

            {{ Form::textarea( "content" , Input::old( "content", $item->content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Block Content' ) ) }}




    </div>


<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">Posts</span>
        <?php $posts = HugoKalidas\LaravelFlexCms\Posts\Posts::lists('title','id');


        $storedPosts = $item->posts()->lists('posts_id');
        ?>

        {{ Form::select( "posts" ,$posts, null , array( 'class'=>'form-control chosen-select chosenDataTrigger'  ) ) }}




    </div>
    <button type="button" data-model="Blocks" data-relation="posts" data-instance="{{$item->id}}" data-related=""   class="btn btn-primary btn-sm attacher pull-right">Add post to this block</button>
</div>

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Posts Attached to this Page</div>
    <div class="panel-body">

    </div>

    <!-- Table -->
    <table  class="table loadable">
        <thead>
        <tr>

            <th>Post</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if ($item->posts()->count())
        @foreach ($item->posts()->get() as $post)
        <tr>
            <td>{{$post->title}}</td>

            <td><button type="button" data-model="Blocks" data-relation="posts" data-instance="{{$item->id}}" data-related="{{$post->id}}"  class="btn btn-primary btn-sm detacher">Detach</button></td>
        </tr>

        @endforeach
        @else
        <tr>
            <td>No posts in this block yet</td>

            <td></td>
        </tr>
        @endif
        </tbody>
    </table>
</div>



@stop
