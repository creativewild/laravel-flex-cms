<div class="container">

  <div class="row">
    <!-- /tabs -->
    <div><h3>Tabs -left</h3>
          	
  
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
          <?php $count=1;?>
          @foreach ($block->posts()->get() as $post)
            @if ($count==1)         
              <li class="active"><a href="#{{$post->slug}}" data-toggle="tab">{{$post->title}}</a></li>
            @else
              <li><a href="#{{$post->slug}}" data-toggle="tab">{{$post->title}}</a></li>
            @endif
            <?php $count++;?>
          @endforeach
        </ul>
        <div class="tab-content">
           <?php $count=1;?>
          @foreach ($block->posts()->get() as $post)
              @if ($count==1)     
                <div class="tab-pane active" id="{{$post->slug}}">{{$post->content}}</div>
               @else
             <div class="tab-pane" id="{{$post->slug}}">{{$post->content}}</div>
              @endif
             <?php $count++;?>
          @endforeach
        </div>
      </div>
      <!-- /tabs -->
      
    </div>
    
   
    
  </div>
</div>
  