<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class CommonController extends Controller
{
    public function __construct ( Request $request = null )
	{
		parent::__construct( $request );
		//执行登录验证
		//$_SESSION['admin']['admin_id'];
		if(!session('ss_id'))
		{
			$this->redirect('index/login/index');
		}
	}
}
