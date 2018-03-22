<?php
namespace app\index\controller;
//use think\Db;//引入数据类
use app\common\model\Teacher;
use think\Controller;
class TeacherController extends Controller{
	public function index()
	{
		return $this->fetch();
	}
	public function hi()
	{
		echo "hi";
	}
}