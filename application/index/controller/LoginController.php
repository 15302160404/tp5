<?php
namespace app\index\controller;
use think\Controller;

/**
 * 登录
 */
class LoginController extends Controller
{
	
	public function index()
	{
		return $this->fetch();
	}
	public function login(){
		if (!request()->isPost()) {
			return $this->error('非法登录','login/index');exit;
		}
		$result = model('Admin')->login(input('post.'));
		if(!$result['valid']){
			return $this->error($result['msg']);exit;
		}
		return $this->success($result['msg'],'index/index');
	}
}