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
	/**
	 * 保存记录
	 * @return [type] [description]
	 */
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
	/**
	 * 删除记录
	 * @return [type] [description]
	 */
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
	/**
	 * 编辑记录
	 */
	public function edit()
	{
		if(input('?param.id'))
		{
			$id = input('param.id');
		}
		$courses = model('course')->where('id',$id)->select();
		return $this->fetch('',['courses'=>$courses]);
	}
	/**
	 * 更新记录
	 */
	public function update()
	{
		if(request()->isPost())
		{
			$data = input('post.');
			$validate = validate('Course');
			if(!$validate->check($data))
			{
				return $this->error($validate->getError());
			}
			$result = model('Course')->save([
				'name'=>$data['name']
			],['id'=>$data['id']]);
			if($result)
			{
				return $this->success('更新成功','course/index');
			}
			return $this->error('更新失败');
		}
	}
	/**
     * 错误页面
     * @return [type] [description]
     */
    public function wrong(){
        return $this->error('抱歉，暂无此功能');
    }
}