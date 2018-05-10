<?php
namespace app\index\controller;
use think\Controller;

class KlasscourseController extends Controller
{
	public function index()
	{
		$courses=Model('KlassCourse')-> getAll();
		return $this->fetch('',[
				'courses'=>$courses
			]);
	}
	public function del(){
		if (input('?param.id'))
        {
            $id = input('param.id');
            $result = model('KlassCourse')->where('id',$id)->delete();
            if(!$result){
                return $this->error('删除失败');exit;
            }
            return $this->success('删除成功','index');
        }
	}
	public function add(){
		$courses = model('course')->getCourses();
		$klasss = model('klass')->getKlasss();
		return $this->fetch('',['courses'=>$courses,'klasss'=>$klasss]);
	}
	public function save(){
		if (!request()->isPost()) {
			return $this->error('非法登录');exit;
		}
		$data = input('post.');
		$validate = validate('Klasscourse');
		if (!$validate->check($data)) {
			return $this->error($validate->getError());
		}
		$klassIDs = $data['klass_id'];
		$courseIDs = $data['course_id'];
		$kcs = [];
		foreach ($klassIDs as $key => $klassID) {
			$kcs [$key]['klass_id'] = $klassID;
			$kcs [$key]['course_id'] = $courseIDs;
		}
		$id = model('KlassCourse')->saveAll($kcs);
		if ($id) {
			return $this->success('添加成功','klass/index');
		}
		return $this->error('添加失败');
	}
	/**
	 * 编辑记录
	 */
	public function edit()
	{
		if(input('?param.id'))
		{
			$id = input('param.id');
		}
		$klasscourses = model('klasscourse')->where('id',$id)->select();
		
		return $this->fetch('',[]);
	}
}

	