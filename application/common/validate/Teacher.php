<?php
namespace app\common\validate;

use think\Validate;
class Teacher extends Validate
{
    protected $rule = [
        'username' => 'require',
        'name' => 'require',
        'email' => 'require|email',
        'password' => 'require|max:8',
    ];
    protected $message = [
        'username.require' => '用户名不能为空',
        'name.require'=>'名字不能为空',
        'email.require'=>'邮箱不能为空',
        'email.email'=>'邮箱的格式不正确',
        'password.require' =>'密码不能为空',
        'password.max'=>'密码的长度已超过8个字符',
    ];
}