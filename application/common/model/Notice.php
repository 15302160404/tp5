<?php
namespace app\common\model;
use think\Model;

class Notice extends Model
{
	protected $pk = 'id';
	protected $table = 'yunzhi_notice';
	public function getNotice()
	{
		$data=[];
		//排序方式
		$order=['id'=>'asc'];
	    return	$this->where($data)
				->order($order)
				->paginate();  //1
	}
}