<?php
namespace app\common\model;
use think\Model;
class Teacher extends Model{
	//取数据
	public function getAllTeacher()
	{
		//查询条件 'sex'=>0
		$data=[];
		//排序方式
		$order=['id'=>'desc','sex'=>'desc'];
	    return	$this->where($data)
				->order($order)
				->paginate();  //1
	}
}