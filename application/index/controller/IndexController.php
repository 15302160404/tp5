<?php
namespace app\index\controller;

class IndexController extends CommonController //2
{
    public function index()
    {
      return $this->fetch();
    }
}
