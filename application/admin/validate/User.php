<?php
namespace app\admin\validate;
use think\Validate;
/*
添加用户时验证
 */
class User extends Validate{

    //验证规则数组的索引必须和验证数据数组的索引一致
    protected $rule = [
       ['username' ,'require|max:20|unique:user','用户名必须|用户名最多20字节|用户名重复'],
       ['repass','require|confirm:pass','两次密码不一致'],
       ['email','email','邮箱格式错误']
    ];

}