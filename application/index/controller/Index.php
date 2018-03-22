<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index  extends Controller
{
    public function index()
    {
      $all=  Db::name('teacher')->select();
      echo '<pre>';
      var_dump($all);
      echo '<pre>';
    }
}
