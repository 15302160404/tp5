<?php
namespace app\common\model;
use think\Model;

class Student extends Model{

	public function getStudent(){
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
}