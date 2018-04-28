<?php
namespace app\common\validate;

use think\Validate;
class Course extends Validate
{
    protected $rule = [
        'name' => 'require',
    ];
    protected $message = [
        'name.require'=>'名字不能为空',
    ];
}