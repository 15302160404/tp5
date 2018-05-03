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
}

	