<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 5/26/14
 * Time: 11:50 AM
 */

namespace HugoKalidas\LaravelFlexCms\Controllers;
use Illuminate\Support\MessageBag;
use View, Redirect, Input, App, Request, Config, Response, Session, Mail, URL, Validator;

use HugoKalidas\LaravelFlexCms\Blocks\Blocks as Blocks ;
use HugoKalidas\LaravelFlexCms\Columns\Columns as Columns ;
use HugoKalidas\LaravelFlexCms\ElementClasses\ElementClasses as HTMLCLASS;
use Empresa as Empresa;


class UtilitiesController extends BaseController {

    private static $dataModels = array(
                                'Blocks' =>     'HugoKalidas\LaravelFlexCms\Blocks\Blocks',
                                'Columns' =>    'HugoKalidas\LaravelFlexCms\Columns\Columns',
                                'Posts' =>      'HugoKalidas\LaravelFlexCms\Posts\Posts',
                                'Menus' =>      'HugoKalidas\LaravelFlexCms\Menus\Menus',
                                'Containers' => 'HugoKalidas\LaravelFlexCms\Containers\Containers',
                                 'Empresa' => 'Empresa'
    );

    public function getIndex()
    {

    }


    public function postAddColumn () {


        $blockName = Input::all()['postData'][0]['blockName'];
        $column = Input::all()['postData'][1]['column'];
        $page = Input::all()['postData'][2]['page'];
        $column = Columns::find($column);
        $block=Blocks::where('title','=',$blockName)->first();
        $blockRel=Blocks::where('title','=',$blockName)->first()->columns;
        try
        {
            $block->columns()->attach($column->id , array('pages_id'=>$page));
        }
        catch (Exception $e)
        {

        }






    }



    public function postAttachModel () {

        //todo refactor to attach with multiple pivot columns
        $data = Input::get('postData');
        $dataModel= UtilitiesController::$dataModels[$data['model']];
        $dataRelation=$data['relation'];
        $dataInstance=$data['instance'];
        $dataRelated=$data['related'];
        $obj = $dataModel::find($dataInstance);
        Session::put('data',Input::all());
        //todo if model is allowed and user is admin

        if ($dataRelation=='classes') {
            $queryfield='element_classes_id';

        }

        elseif ($dataRelation=='columns') {
            $queryfield='columns.id';

        }

        else {


                $queryfield=$dataRelation.'_id';
        }


        if (!$obj->$dataRelation()->where($queryfield,'=',$dataRelated)->count()) {
            if (isset($data['pivotcolumn'])) {
                // todo save pivots
                //$obj->$dataRelation()->newPivotStatementForId($dataRelated)->where($data['pivotcolumn'], $data['pivotvalue'])->delete();
            }
            else {
                if ($dataRelation=="columns") {
                    Session::put('col','nice');
                    $col=new Columns();
                    $col->order=$obj->$dataRelation()->count()+1;
                    $col->containers_id=$dataInstance;
                    $col->save();
                }

               // elseif($data['model']=="Columns") Session::put('barista','fuck This');
                else $obj->$dataRelation()->attach($dataRelated);
            }
        }
    }


    // todo refactor identifiers names to something more generic
    public function postDetachColumn () {
      //  Session::put('all',Input::all());
        //todo refactor to column with pivot
        $data = Input::get('postData');
        $dataModel= UtilitiesController::$dataModels[$data['model']];
        $dataRelation=$data['relation'];
        $dataInstance=$data['instance'];
        $dataRelated=$data['related'];
        $obj = $dataModel::find($dataInstance);

        //todo if model is allowed and user is admin
        if (isset($data['pivotcolumn'])) {

            $obj->$dataRelation()->newPivotStatementForId($dataRelated)->where($data['pivotcolumn'], $data['pivotvalue'])->delete();
        }
        else {
            //refactor
            if ($dataRelation == "columns") {
                //$obj->$dataRelation()->delete($dataRelated);
                $target=Columns::find($dataRelated);
                $target->deleteClasses();
                $target->delete();
                $cols = $obj->$dataRelation();
                if ($cols->count()) {
                    $count =1;
                    foreach ($cols->get() as $col) {
                        $col->order = $count;
                        $col->save();
                        $count++;
                    }
                }

            }
            else  $obj->$dataRelation()->detach($dataRelated);
        }

    }

    public function saveAsset() {

        $imp = Input::all();
        Session::put('imp',$imp);

        file_put_contents ( $imp['filepath']  , $imp['contents']);

    }


    public function addClass() {
        Session::put('key',Input::all());
        $imp = Input::get('classtoadd');
        Session::put('keybar',$imp);
        $classtoadd = new HTMLCLASS();
        $classtoadd->html_class=$imp;
        $classtoadd->save();

        return;

    }

    public function postContactUs () {
	 $data= array('messageInput'=>Input::get('message'),'tel'=> Input::get('telephone'),
            'name'=> Input::get('name'),'email'=> Input::get('email')
        );

        $empresaMail=Input::get('empresa_email');
        $subject = 'Contacto Bidaempresa';

        $validator = Validator::make(Input::all(),

            array(
                'name' => 'required',
                'message' => 'Required',
                'email' => 'required|email'
            )
        );
        //Todo refactor to put subject and target view in form
        if (!empty( $empresaMail)){
            $email = $empresaMail;

            $recipient = Input::get('empresa_nome');


        }
        else {
            $email = Config::get('laravel-flex-cms::app.support_email');
		$data['empresa']=Input::get('empresa');
            $recipient='Suporte';
        }
      

        //Redirect::to(URL::previous())
     $bag=new MessageBag();
        if ($validator->fails())
        {
            $bag->add('pt','Formulário Incompleto');
            return Redirect::back()->withInput()->withErrors( $bag->toArray() );
        }
        else {
            Mail::send('laravel-flex-cms::emails.contactUs', $data, function($message) use($email,$subject,$recipient)
            {
                $message->to($email, $recipient)->subject($subject);
            });
            $bag->add('pt','Obrigado Pelo seu Contacto');
            return Redirect::back()->withErrors( $bag->toArray()  );
        }


    }
} 
