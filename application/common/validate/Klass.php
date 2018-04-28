<?php
namespace app\common\validate;

use think\Validate;
class Klass extends Validate
{
    protected $rule = [
        'name' => 'require',
        'vote' =>'require|captcha'
    ];
    protected $message = [
        'name.require'=>'班级名称不能为空',
        'vote.require'=>'验证码不能为空',
        'vote.captcha'=>'验证码不正确'
    ];
}