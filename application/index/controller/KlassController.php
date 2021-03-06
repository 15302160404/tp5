<?php
namespace app\index\controller;
use think\Controller;

class KlassController extends Controller{

	public function index(){

		$klass=Model('Klass')-> getKlass();
		return $this->fetch('',[
				'klass'=>$klass
			]);
	}
	public function add(){
		$teachers = model('teacher')->getTeacher();
		return $this->fetch('',['teachers'=>$teachers]);
	}
	public function save(){
		if (!request()->isPost()) {
			return $this->error('非法登录');exit;
		}
		$data = input('post.');
		$validate = validate('klass');
		if (!$validate->check($data)) {
			return $this->error($validate->getError());
		}
		$dataKlass = [
			'name'=>$data['name'],
			'teacher_id'=>$data['teacher_id']
		];
		$id = model('klass')->save($dataKlass);
		if ($id) {
			return $this->success('添加成功','klass/index');
		}
		return $this->error('添加失败');
	}
	public function del(){
		if (input('?param.id'))
        {
            $id = input('param.id');
            $result = model('Klass')->where('id',$id)->delete();
            if(!$result){
                return $this->error('删除失败');exit;
            }
            return $this->success('删除成功','klass/index');
        }
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
		$klass = model('Klass')->where('id',$id)->select();
		$teachers = model('Teacher')->getTeacher();
		return $this->fetch('',['klass'=>$klass,'teachers'=>$teachers]);
	}
	/**
     * 错误页面
     * @return [type] [description]
     */
    public function wrong(){
        return $this->error('抱歉，暂无此功能');
    }
}