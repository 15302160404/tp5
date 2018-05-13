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
	public function del(){
		if (input('?param.id'))
        {
            $id = input('param.id');
            $result = model('Student')->where('id',$id)->delete();
            if(!$result){
                return $this->error('删除失败');exit;
            }
            return $this->success('删除成功','index');
        }
	}
	/**
	 * 编辑记录
	 * @return [type] [description]
	 */
	public function edit()
	{
		if(input('?param.id'))
		{
			$id = input('param.id');
		}
		$student = model('student')->where('id',$id)->select();
		$klasss = model('klass')->getKlasss();
		return $this->fetch('',['student'=>$student,'klasss'=>$klasss]);
	}
	/**
	 * 更新记录
	 */
	public function update()
	{
		if(request()->isPost())
		{
			$data = input('post.');
			$validate = validate('Student');
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $result = model('student')->save([
            	'name'=>$data['name'],
            	'sex'=>$data['sex'],
            	'klass_id'=>$data['klass_id'],
            	'email'=>$data['email'],
            	'num'=>$data['num']
            ],['id'=>$data['id']]);
            if ($result) {
            	return $this->success('更新成功','student/index');
            }
            return $this->error('更新失败');
		}
		return $this->error('非法登录');
	}
	/**
     * 错误页面
     * @return [type] [description]
     */
    public function wrong(){
        return $this->error('抱歉，暂无此功能');
    }
}