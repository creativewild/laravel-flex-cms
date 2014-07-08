<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use View, Redirect, Input, App, ReflectionClass, Request, Config, Response, Session;
class IncludesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $view_key='includes';
	private $folderPath;
	
	private function setPath (){
	
		if (is_dir(app_path().'/views/packages/hugo-kalidas/laravel-flex-cms/main/includes')){
			$this->folderPath=app_path().'/views/packages/hugo-kalidas/laravel-flex-cms/main/includes';
		}	
		else $this->folderPath=base_path().'/vendor/hugo-kalidas/laravel-flex-cms/src/views/main/includes';
		return $this->folderPath;	
	}
	
	private function listFiles()
	    {
		app_path();
		$dir=$this->setPath();	
		
		$items =  scandir($dir); 
		$items = array_except($items,array('0','1'));  
	    
		return $items;
	    }

	
	public function getIndex()
	    {
		
		$items = $this->listFiles();  
	    
		return View::make( 'laravel-flex-cms::'.$this->view_key.'.index' )
		            ->with( 'items' , $items);
	    }


	public function getEdit( $id )
    {
		
		$uploadsTarget=array();
		$id=$id+2; //striped '.' and '..'
	     	$item = $this->listFiles()[$id];
		$path=$this->setPath().'/'.$item;
		$uploadsTarget = json_encode($uploadsTarget);
		

		return View::make('laravel-flex-cms::'.$this->view_key.'.edit')
		            ->with( 'item' , $item )
		            ->with('model',$this->view_key)
				->with('uploadable',false)
		           
				->with('path',$path);
			
	    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
