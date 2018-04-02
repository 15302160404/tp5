<?php
namespace app\common\model;
use think\Model;

class Course extends Model{

	public function getCourse(){
		//分页
		$order=['id'=>'desc'];
		return $this->order($order)
					->paginate();
	}
}