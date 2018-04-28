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
	public function del(){
		if (input('?param.id'))
        {
            $id = input('param.id');
            $result = model('Course')->where('id',$id)->delete();
            if(!$result){
                return $this->error('删除失败');exit;
            }
            return $this->success('删除成功','index');
        }
	}
}