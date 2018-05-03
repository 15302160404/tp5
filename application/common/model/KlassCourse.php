<?php
namespace app\common\model;
use think\Model;

class KlassCourse extends Model{

	public function getAll(){
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
    public function Klass(){
    	return $this->belongsTo('Klass');
    }
    public function Course(){
    	return $this->belongsTo('Course');
    }
}