<?php
namespace app\admin\controller;
use controller\BasicAdmin;
use think\Db;


class User extends BasicAdmin{

	public function add(){
       
	   $this->table = 'xy_user';
	   $this->valObj = 'User';
	   $this->validate = true;
       $data['username'] = trim(input('post.username'));
       $data['email'] = trim(input('post.email'));
       $data['salt'] = rand(100,9999);
       $data['pass'] = trim(input('post.pass'));
       $data['repass'] = trim(input('post.repass'));
       $data['password'] = md5(trim(input('post.pass')).md5($data['salt']));
	   $this->_form( $dbQuery=null, $tplFile='', $data );
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