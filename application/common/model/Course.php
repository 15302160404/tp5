<?php
namespace app\common\model;
use think\Model;

class Course extends Model{

	public function getCourse(){
		//分页
		$order=['id'=>'asc'];
		return $this->order($order)
					->paginate();
	}
	public function add($data)
    {
        $this->save($data);
	    return $this->id;
    }
    public function getCourses(){
		//分页
		$order=['id'=>'asc'];
		return $this->order($order)
					->select();
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
}