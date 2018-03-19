<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;
use app\admin\model\User;

class Admin extends Controller{

	public function add(){
	   if( $this->request->isPost() ){
          $data['username'] = trim(input('post.username'));
          $data['email'] = trim(input('post.email'));
          $data['salt'] = rand(100,9999);
          $data['pass'] = trim(input('post.pass'));
          $data['repass'] = trim(input('post.repass'));
          $data['password'] = md5(trim(input('post.pass')).md5($data['salt']));
          $validate = Loader::validate('User');
          if(!$validate->check($data)){
             //dump($validate->getError());
             $this->error($validate->getError());
          }else{
          	$user = new User($data);
          	$res = $user->allowField(true)->save(); 
          	dump($res);
          }     
	   }else{
          return $this->fetch('');
	   }
	}

}