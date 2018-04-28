<?php
namespace app\index\controller;
use think\Controller;

class CourseController extends Controller{

	public function index(){

		$courses=Model('Course')-> getCourse();
		return $this->fetch('',[
				'courses'=>$courses
			]);
	}
	public function add()
	{
		return $this->fetch();
	}
	public function save(){
		if (!request()->isPost()) {
			return $this->error('非法登录');exit;
		}
		$data = input('post.');
		$validate = validate('course');
		if (!$validate->check($data)) {
			return $this->error($validate->getError());
		}
		$dataCourse = [
			'name'=>$data['name'],
		];
		$id = model('course')->add($dataCourse);
		if (!$id) {
			return $this->error('添加课程失败');
		}
		return $this->success('添加课程成功','course/index');
	}
}