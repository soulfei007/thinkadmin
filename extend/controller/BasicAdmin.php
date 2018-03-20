<?php
namespace controller;
use think\Db;
use think\Controller;
use think\Loader;

class BasicAdmin extends Controller{

   //是否验证
   public $validate = false;
   public $valObj;
   public $table ;

   protected function _form( $dbQuery=null, $tplFile='', $data =[] ){
      $db = ($dbQuery)?$dbQuery:Db::name($this->table);
      if( $this->request->isPost() ){
      	 if( $data ){
            if( $this->validate ){
               if( $check = $this->_check($this->valObj,$data) === true ){
               	 $result = $db->insert($data);
               } 
            }
      	 }else {
            $datas = $this->request->post();
            $tableField = $db->getTableFields(['table'=>$this->table]);
            foreach( $tableField as $k => $v ){ 
               if( isset($datas[$v]) ){
               	$allowDatas[$v] = $datas[$v];
               }
            }
            $result = $db->insert($data);
      	 }
      	 $result !== false ? $this->success('数据保存成功!',''):$this->error('数据保存失败!');	 
      }
   }

   private function _check( $valObj,$data ){
      $validate = Loader::validate( $valObj );
      if( $validate->check($data) ){
         return true;
      }else{
      	return  $this->error($validate->getError());
      }

   }


}

