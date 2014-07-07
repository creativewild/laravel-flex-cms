<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use HugoKalidas\LaravelFlexCms\Accounts\User;
use HugoKalidas\LaravelFlexCms\Newsletters\NewslettersInterface;
use HugoKalidas\LaravelFlexCms\Newsletters\Newsletters;
use Input, Redirect, Str, View, Mail;
use Illuminate\Support\MessageBag;
class NewslettersController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'newsletters';

    /**
     * Construct Shit
     */
    public function __construct( NewslettersInterface $newsletters )
    {
        $this->model = $newsletters;
        parent::__construct();
    }

    /**
     * The method to handle the posted data
     * @param  integer $id The ID of the object
     * @return Redirect
     */

    public function getSend( $id )
    {
        $receivers = User::where('newsletter','=','1')->get();
        $newsletter = Newsletters::find($id);
        $cont = $newsletter->content;
        $subject = $newsletter->title;

        $data= array('content'=>$cont);

        foreach ($receivers as $receiver) {
            $email= $receiver->email;
            $name = $receiver->first_name;
                Mail::send('laravel-flex-cms::emails.newsletter', $data, function($message) use($subject,$email,$name)
            {
                $message->from('geral@bidaempresa.pt', 'Newsletter');
                $message->to($email, $name)->subject($subject);
            });
        }




        return Redirect::to('/admin/newsletters');
    }

    public function postSubscribe(  )
    {
        $email=Input::get('email');

        $existingUser=User::where('email','=',$email);
        if (!$existingUser->count()){
            $user = new User();
            $user->email=$email; //mal no form
            $name = explode(' ', Input::get('first_name'));
            $user->first_name=$name[0];
            $nameLen=count($name);
            $lastname='';
            for ($i=1;$i<$nameLen;$i++){
                $lastname=$lastname.' '.$name[$i];
            }
            $user->last_name=$lastname;
            $user->password="dfhusdiou@afioddfasui_%&%SDFGHJKL";
        }
        else $user=$existingUser->first();

        $user->newsletter=1;


        $user->save();

        return Redirect::to('/');
    }

}