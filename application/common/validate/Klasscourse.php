<?php
namespace app\common\validate;

use think\Validate;
class Klasscourse extends Validate
{
    protected $rule = [
        'klass_id' => 'require',
    ];
    protected $message = [
        'name.require'=>'班级不能为空',
    ];
}