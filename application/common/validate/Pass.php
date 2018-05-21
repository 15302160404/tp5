<?php
namespace app\common\validate;
use think\Validate;

class Pass extends Validate
{
	protected $rule = [
		'pwd_origin'=>'require',
		'pwd_new'=>'require',
		'pwd_confirm'=>'require'
	];
	protected $message = [
		'pwd_origin.require'=>'原始密码不能为空',
		'pwd_origin.new'=>'新密码不能为空',
		'pwd_origin.confirm'=>'确认密码不能为空',
	];
}