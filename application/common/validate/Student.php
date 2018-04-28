<?php
namespace app\common\validate;

use think\Validate;
class Student extends Validate
{
    protected $rule = [
        'name' => 'require',
        'klass_id'=>'require',
        'num'=>'require|number',
        'email'=>'require|email'
    ];
    protected $message = [
        'name.require'=>'班级名称不能为空',
        'klass_id.require'=>'班级不能为空',
        'num.require'=>'学号不能为空',
        'num.number'=>'请输入正确的学号',
        'email.require'=>'邮箱不能为空',
        'email.email'=>'邮箱格式不正确',
    ];
}