<?php
namespace app\admin\controller;
use think\Controller;

class Login extends Controller
{
    public function index(){
      if( $this->request->isGet() ){
      	 return $this->fetch('');
      }else{
      	 $userName = trim(input('psot.username'));
      	 $password = trim(input('psot.password'));
      }
      
    }
}
