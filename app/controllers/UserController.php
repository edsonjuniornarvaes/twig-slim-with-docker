<?php

namespace app\controllers;

use app\models\Users;
use app\src\Validate;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends Controller{

    private $user;

    public function __construct()
    {
        $this->user = new Users;   
    }

  public function edit($request,$response,$args){

    $user = $this->user->select()->where('id',$args['id'])->first();

    $this->view('user',[
        'title' => 'Editar user',
        'user' => $user
    ]);
  }

  public function update($request,$response,$args){

    $validate = new Validate;

    $data = $validate->validate([
        'name' => 'required',
        'email' => 'required:email',
        'phone' => 'required:phone',
    ]);

    if ($validate->hasErrors()) {
        return back();
    }

    $updated = $this->user->find('id',$args['id'])->update((array)$data);

    if($updated){
        flash('message',success('Atualizado com sucessos !'));

        return back();
    }

    flash('message',error('Erro ao atualizar !'));

    return back();

  }

  public function destroy($request,$response,$args){

    $deleted = $this->user->destroy('id',$args['id']);

    if($deleted){
        return redirect('/');
    }

  }

}