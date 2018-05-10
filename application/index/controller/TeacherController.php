<?php
namespace app\index\controller;

use think\Controller;
use think\Request;  //1 引入
class TeacherController extends Controller{  //2继承
    /**
     * 查看记录
     */
	public function index()
	{
	   $teachers= model('Teacher')->getAllTeacher();
	  //$this->assign('teachers',$teachers);
      //return $this->fetch();
	   return $this->fetch('',['teachers'=>$teachers]);
	}

    /**
     * url测试
     * @return mixed
     */
	public function hi()//index.html
	{
		return $this->fetch('test@test/hello');
	}
	public function add(){
		return $this->fetch();
	}

    /**
     * 添加纪录
     */
	public function save(){
		//return $this->redirect(url('teacher/hi'));
        //判断提交方式post
        if(!request()->isPost()){
            $this->error('非法登录');
        }
        //获取提交数据
        $data = input('post.');
        //验证数据合法性
        $validate = validate('teacher');
        if(!$validate->check($data)){
            $this->error($validate->getError());
        }
        //数据再加工
        $teacherData = [
            'name'=>$data['name'],
            'username'=>$data['username'],
            'email'=>$data['email'],
            'sex'=>$data['sex'],
            'password'=>md5($data['password'])
        ];
        //调用模型里的增加数据方法
        $id = model('teacher')->add($teacherData);
        //根据返回结果判断是否保存成功
        if($id){
            $this->success('注册成功，您的新ID为：'.$id,'index');
        }
        $this->error('注册失败');
	}

    /**
     * 删除记录
     */
	public function del()
    {
//        $id = Request::instance()->get('id');
        if (input('?param.id'))
        {
            $id = input('param.id');
            $result = model('Teacher')->where('id',$id)->delete();
            if(!$result){
                return $this->error('删除失败');exit;
            }
            return $this->success('删除成功','index/index');
        }
    }
    /**
     * 编辑记录
     */
    public function edit()
    {
        if (input('?param.id'))
        {
            $id = input('param.id');
        }
        $teachers = model('Teacher')->where('id',$id)->select();
        return $this->fetch('',['teachers'=>$teachers]);
    }
    /**
     * 更新记录
     */
    public function update()
    {
        if(request()->isPost()){
            $data = input('post.');
            $validate = validate('Teacher');
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $result = model('Teacher')->save([
                'name'=>$data['name'],
                'username'=>$data['username'],
                'email'=>$data['email'],
                'sex'=>$data['sex']
            ],['id'=>$data['id']]);
            if ($result) {
                return $this->success('更新成功','teacher/index');
            }
            return $this->error('更新失败');
        }
    }
}