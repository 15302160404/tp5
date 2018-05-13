<?php
namespace app\common\validate;

use think\Validate;
class Klass extends Validate
{
    protected $rule = [
        'name' => 'require',
    ];
    protected $message = [
        'name.require'=>'班级名称不能为空',
    ];
}