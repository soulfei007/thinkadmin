<?php
namespace extend\controller;
use think\Controller;

class BasicAdmin extends Controller{

   /*
   是否验证
    */
   public $validate = false;

   protected function _add( $obj, $datas ){
      if( $this->request->isPost() ){
          $obj = new $obj;
      }

   }


}