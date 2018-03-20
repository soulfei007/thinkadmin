<?php
namespace controller;
use think\Db;
use think\Controller;
use think\Loader;

class BasicAdmin extends Controller{

   //是否验证
   public $validate = false;

   public $table ;

   protected function _form( $dbQuery=null, $tplFile='', $data =[]){
      $db = ($dbQuery)?$dbQuery:Db::name($this->table);
      if( $this->request->isPost() ){
      	 if( $data ){
            
      	 }else{
      	   $datas = $this->request->post();
           $tableField = $db->getTableFields(['table'=>$this->table]);
           foreach( $tableField as $k => $v ){ 
              if( isset($datas[$v]) ){
              	$allowDatas[$v] = $datas[$v];
              }
           }
      	 }
      }
   }

   private function _check(){



   }


}

