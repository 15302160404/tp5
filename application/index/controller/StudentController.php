<?php
namespace app\index\controller;
use think\Controller;

class StudentController extends Controller{

	public function index(){

		$students=Model('Student')-> getStudent();
		return $this->fetch('',[
				'students'=>$students
			]);
	}
	public function add()
	{
		$klass = model('klass')->getKlasss();
		return $this->fetch('',['klass'=>$klass]);
	}
	public function save(){
		if (!request()->isPost()) {
			return $this->error('非法登录');exit;
		}
		$data = input('post.');
		$validate = validate('student');
		if (!$validate->check($data)) {
			return $this->error($validate->getError());
		}
		$dataStudent = [
			'name'=>$data['name'],
			'num'=>$data['num'],
			'sex'=>$data['sex'],
			'klass_id'=>$data['klass_id'],
			'email'=>$data['email'],
		];
		$id = model('student')->add($dataStudent);
		if (!$id) {
			return $this->error('添加学生失败');
		}
		return $this->success('添加学生成功','student/index');
	}
}