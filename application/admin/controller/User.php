<?php
namespace app\admin\controller;
use controller\BasicAdmin;
use think\Db;



class User extends BasicAdmin{

	public function add(){
	   /*if( $this->request->isPost() ){
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
          	if($res){
          	  $this->success('添加用户成功');
          	}
          }     
	   }else{
          return $this->fetch('');
	   }*/
	   $this->table = 'xy_user';
	   $this->_form();
	   return $this->fetch('');
	}

	public function lst(){
      $user = Db::name('user')->select();
      if( $user ){
      	$this->assign('data',$user);
        return $this->fetch('');
      }
      
	}

}