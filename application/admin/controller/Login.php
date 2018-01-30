<?php
namespace app\admin\controller;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
    	//$this->success('登陆成功','');
       return $this->fetch(''); 
    }
}
