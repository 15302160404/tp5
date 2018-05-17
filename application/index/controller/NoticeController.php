<?php
namespace app\index\controller;
use think\Controller;

/**
* 
*/
class NoticeController extends Controller
{
	/**
	 * 显示记录
	 * @return [type] [description]
	 */
	public function index()
	{
		$notices = model('notice')->getNotice();
		return $this->fetch('',['notices'=>$notices]);
	}
	/**
	 * 添加记录
	 */
	public function add()
	{
		return $this->fetch();
	}
	/**
	 * 保存记录
	 */
	public function save()
	{
		if(!request()->isPost()){
			return $this->error('非法登录');exit;
		}
		$data = input('post.');
		$validate = Validate('notice');
		if(!$validate->check($data)){
			return $this->error($validate->getError());
		}
		$result = model('Notice')->save([
			'title'=>$data['title'],
			'content'=>$data['content'],
			'status'=>$data['status']=1
		]);
		if(!$result)
		{
			return $this->error('添加失败');
		}
		return $this->success('添加成功','notice/index');
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
		$notices = model('notice')->where('id',$id)->select();
		return $this->fetch('',['notices'=>$notices]);
	}
	/**
	 * 更新记录
	 */
	public function update()
	{
		if (!request()->isPost()) {
			return $this->error('非法登录');exit;
		}
		$data = input('post.');
		$validate = Validate('notice');
		if(!$validate->check($data)){
			return $this->error($validate->getError());
		}
		$result = model('Notice')->save([
			'title'=>$data['title'],
			'content'=>$data['content'],
			'status'=>$data['status']
		],['id'=>$data['id']]);
		if(!$result)
		{
			return $this->error('更新失败');
		}
		return $this->success('更新成功','notice/index');
	}
	/**
	 * 删除记录
	 */
	public function del()
	{
		if(input('?param.id'))
		{
			$id = input('param.id');
		}
		$notices = model('notice')->where('id',$id)->delete();
		if($notices){
			return $this->success('删除成功','notice/index');
		}
		return $this->error('删除失败');
	}
	/**
     * 错误页面
     * @return [type] [description]
     */
    public function wrong(){
        return $this->error('抱歉，暂无此功能');
    }
}