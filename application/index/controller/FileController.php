<?php
namespace app\index\controller;

use think\Controller;

class FileController extends Controller
{
    public function index()
    {
    	return $this->fetch();
    }
    public function upload(){
	    // 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('image');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    if($file){
	        $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	            echo $info->getSaveName();
	            // 输出 42a79759f284b767dfcb2a0197904287.jpg
	            echo $info->getFilename();
	            return $this->success('$info->getFilename()','index/index');
	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }
	    }
	}
}
