<?php
namespace app\common\validate;
use think\Validate;

class Pass extends Validate
{
	protected $rule = [
		'pwd_origin'=>'require|different:pwd_new',
		'pwd_new'=>'require|confirm:pwd_confirm',
		'pwd_confirm'=>'require'
	];
	protected $message = [
		'pwd_origin.require'=>'原始密码不能为空',
		'pwd_origin.different'=>'新密码不能和原始密码一致',
		'pwd_new.confirm'=>'两次输入的密码不一致',
		'pwd_origin.new'=>'新密码不能为空',
		'pwd_origin.confirm'=>'确认密码不能为空',
	];
}