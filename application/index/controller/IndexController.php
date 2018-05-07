<?php
namespace app\index\controller;
use think\Controller;//1
use think\Db;
class IndexController extends Controller //2
{
    public function index()
    {
      return $this->fetch();
    }
}
