<?php
namespace app\index\controller;

class IndexController extends CommonController //2
{
    public function index()
    {
    	$admin = model('admin')->select();
     	return $this->fetch('',['admin'=>$admin]);
    }
}
