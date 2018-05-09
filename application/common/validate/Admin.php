<?php
namespace app\common\validate;
use think\Validate;

class Admin extends Validate
{
	protected $rule = [
		'name'=>'require',
		'password'=>'require',
		'code'=>'require|captcha'
	];
	protected $message = [
		'name.require' => '用户名不能为空',
		'password'=>'密码不能为空',
		'code.require'=>'请输入验证码',
		'code.captcha'=>'验证码不正确'
	];
}