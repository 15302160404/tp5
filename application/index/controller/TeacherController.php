<?php
namespace app\index\controller;

use think\Controller;  //1 引入
use app\common\model\Teacher;
class TeacherController extends Controller{  //2继承
	public function index()
	{
	   $teachers= model('Teacher')->getAllTeacher();
	  //$this->assign('teachers',$teachers);
      //return $this->fetch();
	   return $this->fetch('',['teachers'=>$teachers]);
	}
	public function hi()//index.html
	{
		return $this->fetch('test@test/hello');
	}
	public function add(){
		return $this->fetch();
	}
	public function save(){
		//return $this->redirect(url('teacher/hi'));
		$teacher = new Teacher($_POST);
		$teacher->allowField(true)->save();
		if($teacher->id){
			$this->success('添加成功','index');
		}else{
			$this->error('添加失败');exit;
		}

	}
}