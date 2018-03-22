<?php
namespace app\index\controller;
//use think\Db;//引入数据类
use app\common\model\Teacher;
class TeacherController{
	public function index()
	{
  
		

		$teachers=Teacher::all(['sex'=>1,]);
		
	    dump($teachers);
	}
	public function hi()
	{
		echo "aaa";
	}
}