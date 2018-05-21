<?php
namespace app\index\controller;
use think\Controller;

/**
 * 登录
 */
class LoginController extends Controller
{
	//视图渲染
	public function index()
	{
		return $this->fetch();
	}
	//登录
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
	//登出
	public function logout()
	{
		session(null);
		return $this->redirect('login/index');
	}
	//修改管理员密码
	public function pass()
	{
		$data = input('post.');
		$validate = validate('Pass');
		if(!$validate->check($data))
		{
			return $this->error($validate->getError());
		}
		$admin = model('admin')->find();
		if(md5($data['pwd_origin']) != $admin['password']){
			return $this->error('原始密码有误');
		}
		$result = model('admin')->save(['name'=>$admin['name'],'password'=>md5($data['pwd_new'])],['id'=>$admin['id']]);
		if($result)
		{
			return $this->success('密码修改成功','login/index');
		}
		return $this->error('密码修改失败，未知错误');
	}
}