<?php
namespace HugoKalidas\LaravelFlexCms\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use View, Request;
use HugoKalidas\LaravelFlexCms\Pages\Pages as Pages;
use HugoKalidas\LaravelFlexCms\Posts\Posts as Posts;
use HugoKalidas\LaravelFlexCms\Menus\Menus as Menus;
use HugoKalidas\LaravelFlexCms\Blocks\Blocks as Blocks;
use HugoKalidas\LaravelFlexCms\Galleries\Galleries as Galleries;
use HugoKalidas\LaravelFlexCms\Layouts\Layouts as Layouts;
use HugoKalidas\LaravelFlexCms\Assets\Assets as Assets;


class MainController extends BaseController{

    public function getIndex($key){
        $menu = Menus::where('title','=','Main')->first();
        $menuItems = $menu->pages()->get();

        $page = Pages::where('key','=',$key);
        $saibaArray=array(
            'pt'=>'Saiba Mais',
            'en'=>'Read More',
            'es'=>'Saber Más',
            'cn'=>'Saiba Mais',
        );
        $videoArray=array(
            'pt'=>'Video Institucional',
            'en'=>'Institutional Video',
            'es'=>'Video Institucional',
            'cn'=>'Video Institucional',
        );
        //todo attach posts to menu
        $lang=Request::segment(1);
        $saiba=$saibaArray[$lang];
        $video=$videoArray[$lang];

        if ($page->count()) {

            $page = $page->first();

            //todo remove
            $jumbo=$page->filterBlocks('Jumbotron');
            if ($jumbo->count())$jumbo=$jumbo->first();
            else $jumbo = false;
            $tabsLeft=$page->filterBlocks('Tabs-left');
            if ($tabsLeft->count()) $tabsLeft = true;
            else $tabsLeft = false;

            //todo add to page
            $truncate=true;
            return View::make('laravel-flex-cms::main.layouts.grid')->with('menuItems',$menuItems)->with('page',$page)
                    ->with('truncate',$truncate)->with('customStyle','grid.css')->with('jumbo',$jumbo)->with('lang',$lang)
                    ->with('saiba',$saiba)->with('video',$video)->with('tabsl',true);
        }

        else {
            $post = Posts::where('slug','=',$key);
            if ($post->count()) {
                $post= $post->first();
                //todo globals -> single widgets
                //$pubPosts=Blocks::find(5)->posts()->get();
                return View::make('laravel-flex-cms::main.layouts.single')->with('menuItems',$menuItems)
                        ->with('post',$post)->with('pubPosts',false)->with('customStyle','single.css')->with('lang',$lang)
                    ->with('saiba',$saiba)->with('video',$video);
            }
            else {
                return \Redirect::to('pt/home-page');
            }
        }



    }

    public function getGaleriasIndex(){
        $lang=Request::segment(1);
        $menu = Menus::where('title','=','Main')->first();
        $menuItems = $menu->pages()->get();
        $galleries = Galleries::all();
        $destaque = Blocks::where('key','=','destaque-galeria')->first()->posts()->first();
        $publicidade = Blocks::where('key','=','publicidade-galeria')->first()->posts()->get();
        return View::make('laravel-flex-cms::main.layouts.galeria-index')->with('menuItems',$menuItems)->with('destaque',$destaque)
            ->with('publicidade',$publicidade)->with('galleries',$galleries)->with('customStyle','galerias.css')->with('lang',$lang);

    }

    public function getGaleria($id){
        $lang=Request::segment(1);
        $menu = Menus::where('title','=','Main')->first();
        $menuItems = $menu->pages()->get();
        $gallery = Galleries::find($id);

        $publicidade = Blocks::where('key','=','publicidade-galeria')->first()->posts()->get();
        return View::make('laravel-flex-cms::main.layouts.galeria')->with('menuItems',$menuItems)->with('publicidade',$publicidade)
            ->with('gallery',$gallery)->with('customStyle','galerias.css')->with('lang',$lang);

    }



}
