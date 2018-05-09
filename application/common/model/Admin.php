<?php
namespace app\common\model;
use think\Model;

/**
 * 登录
 */
class Admin extends Model
{
	protected $pk = 'id';
	protected $table = 'yunzhi_admin';
	public function login($data)
	{
		$validate = validate('Admin');
		if(!$validate->check($data))
		{
			return ['valid'=>0,'msg'=>$validate->getError()];
		}
		$userInfo = $this->where('name',$data['name'])->where('password',md5($data['password']))->find();
		if(!$userInfo)
		{
			return ['valid'=>0,'msg'=>'帐号或密码不正确'];
		}
		//储存session值
		session('ss_id',$userInfo['id']);
		session('ss_name',$userInfo['name']);
		return ['valid'=>1,'msg'=>'欢迎您!!管理员'];
	}
}