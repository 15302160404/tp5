<?php
namespace app\index\controller;
use think\Controller;

class CourseController extends Controller{

	public function index(){

		$courses=Model('Course')-> getCourse();

		return $this->fetch('',[
				'courses'=>$courses
			]);
	}
}