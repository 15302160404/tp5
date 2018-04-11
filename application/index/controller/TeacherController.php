<?php
namespace app\index\controller;

use think\Controller;  //1 引入
use app\common\model\Teacher;
class TeacherController extends Controller{  //2继承
    //查看记录
	public function index()
	{
	   $teachers= model('Teacher')->getAllTeacher();
	  //$this->assign('teachers',$teachers);
      //return $this->fetch();
	   return $this->fetch('',['teachers'=>$teachers]);
	}
	//url测试
	public function hi()//index.html
	{
		return $this->fetch('test@test/hello');
	}
	public function add(){
		return $this->fetch();
	}
	//添加纪录
	public function save(){
		//return $this->redirect(url('teacher/hi'));
		$teacher = new Teacher($_POST);
        //
        $validate = validate('Teacher');
        if(!$validate->check($_POST)){
            $this->error($validate->getError());exit;
        }
        //$teacher->saveAll(input("post."));
        $teacher->allowField(true)->save();
        $this->success('添加成功','index');
	}
}