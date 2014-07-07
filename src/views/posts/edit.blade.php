@extends('laravel-flex-cms::layouts.interface-edit')

@section('title')
    Edit Post: {{ $item->title }}
@stop

@section('heading')

@stop

@section('form-items')
    <div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <div class="input-group">

                <span class="input-group-addon">Title</span>
                {{ Form::text( "title" , Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
            </div>

        </div>

        <div class="form-group">
            <div class="input-group">

                <span class="input-group-addon">Slug</span>
                {{ Form::text( "slug" , Input::old( "slug" , $item->slug) , array( 'class'=>'form-control' , 'placeholder'=>'slug' ) ) }}

                <span class="input-group-addon">Keywords</span>

                {{ Form::text( "keywords" , Input::old( "keywords" , $item->keywords ) , array( 'class'=>'form-control rich' , 'placeholder'=>'keywords1, keyword2' ) ) }}
             </div>
        </div>
        <div class="form-group">
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#advanced">
            Advanced Options
        </button>
         </div>
<div class="collapse " id="advanced">
        <div class="form-group">
            <div class="input-group">


                <span class="input-group-addon">Post Type</span>

                {{ Form::select( "type" ,$item->typeOptions, Input::old( "type", $item->type ), array( 'class'=>'form-control chosen-select' ) ) }}

            </div>

        </div>

        <div class="form-group">
            <div class="input-group">

                <span class="input-group-addon">Truncate</span>
                {{ Form::select( "truncate" , array('0'=>'false','1'=>'true'),Input::old( "truncate" , $item->truncate) , array( 'class'=>'form-control' ) ) }}

                <span class="input-group-addon">Truncate Length</span>

                {{ Form::text( "truncate_length" , Input::old( "truncate" , $item->truncate_length ) , array( 'class'=>'form-control'  ) )}}
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#intropt">
            Intro Text
        </button>
        <div class="form-group">


        <div id="intropt" class="collapse">
            <div class="input-group">

                <span class="input-group-addon">Intro Text</span>

                {{ Form::textarea( "intro_pt" , Input::old( "intro_pt" , $item->intro_pt ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Intro Text' ) ) }}
            </div>
        </div>

        </div>

        <div class="form-group">
            <div class="col-md-8">
            <div class="input-group">

                <span class="input-group-addon">Classes</span>

                <?php
                //Todo pass the model
                $elClasses = HugoKalidas\FlexCms\ElementClasses\ElementClasses::lists('html_class','id');
                $storedClasses = $item->classes()->lists('id');
                ?>
                {{Form::select('classes[]',$elClasses,$storedClasses,array( 'class'=>'form-control chosen-select',"multiple" =>1 ) )}}
             </div>
             </div>
                <div class="col-md-4">

                <button type="button" class="btn btn-primary btn-sm " data-toggle="collapse" data-target="#newClass">Create New Class</button>
                </div>
            </div>

        <div class="form-group collapse" id="newClass" >
            <div class="col-md-8">
            <div class="input-group">

                <span class="input-group-addon">New Class</span>

                {{ Form::text( "newclass" , null, array( 'class'=>'form-control addClassInput' , 'placeholder'=>'add a class' ) ) }}


            </div>
            </div>
            <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-sm classSubmit" >add</button>
            </div>
        </div>




         <div class="form-group">
             <div class="input-group">

                 <span class="input-group-addon">Description</span>
                 {{ Form::text( "description" , Input::old( "description" , $item->description ) , array( 'class'=>'form-control rich' , 'placeholder'=>'content description meta' ) ) }}
             </div>
        </div>
</div>
        <div class="form-group">

                {{ Form::textarea( "content" , Input::old( "content" , $item->content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}

        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#en">
                En
            </button>

             <div id="en" class="collapse">
                 <div class="input-group">

                     <span class="input-group-addon">Title</span>
                     {{ Form::text( "title_en" , Input::old( "title_en" , $item->title_en ) , array( 'class'=>'form-control rich' , 'placeholder'=>'title en' ) ) }}
                 </div>
                 <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#introen">
                     Intro En
                 </button>

                 <div id="introen" class="collapse">
                     <div class="input-group">

                         <span class="input-group-addon">Intro Text</span>

                         {{ Form::textarea( "intro_en" , Input::old( "intro_en" , $item->intro_en ) , array( 'class'=>'form-control rich' , 'placeholder'=>'English Intro Text' ) ) }}
                     </div>
                 </div>

                 {{ Form::textarea( "en" , Input::old( "en" , $item->en ) , array( 'class'=>'form-control rich' , 'placeholder'=>'English Content' ) ) }}

             </div>

        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#es">
                Es
            </button>

            <div id="es" class="collapse">
                <div class="input-group">

                    <span class="input-group-addon">Title</span>
                    {{ Form::text( "title_es" , Input::old( "title_es" , $item->title_es ) , array( 'class'=>'form-control rich' , 'placeholder'=>'title es' ) ) }}
                </div>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#introes">
                    Intro Es
                </button>

                <div id="introes" class="collapse">
                    <div class="input-group">

                        <span class="input-group-addon">Intro Text</span>

                    {{ Form::textarea( "intro_es" , Input::old( "intro_es" , $item->intro_es ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Spanish Intro Text' ) ) }}
                    </div>
                </div>

                {{ Form::textarea( "es" , Input::old( "es" , $item->es ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Spanish Content' ) ) }}

            </div>

        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#cn">
                Cn
            </button>

            <div id="cn" class="collapse">
                <div class="input-group">

                    <span class="input-group-addon">Title</span>
                    {{ Form::text( "title_cn" , Input::old( "title_cn" , $item->title_cn ) , array( 'class'=>'form-control rich' , 'placeholder'=>'title cn' ) ) }}
                </div>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#introcn">
                    Intro Cn
                </button>

                <div id="introcn" class="collapse">
                    <div class="input-group">

                        <span class="input-group-addon">Intro Text</span>

                        {{ Form::textarea( "intro_cn" , Input::old( "intro_cn" , $item->intro_cn ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Chinese Intro Text' ) ) }}
                    </div>
                </div>
                {{ Form::textarea( "cn" , Input::old( "cn" , $item->cn ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Chinese Content' ) ) }}

            </div>

        </div>


    </div>
    </div>
@stop