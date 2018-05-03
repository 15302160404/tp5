<?php
namespace app\common\validate;

use think\Validate;
class Klasscourse extends Validate
{
    protected $rule = [
        'klass_id' => 'require',
        'vote' =>'require|captcha'
    ];
    protected $message = [
        'name.require'=>'班级不能为空',
        'vote.require'=>'验证码不能为空',
        'vote.captcha'=>'验证码不正确'
    ];
}