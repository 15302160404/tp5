<?php
namespace app\common\validate;

use think\Validate;
class Notice extends Validate
{
    protected $rule = [
        'title' => 'require',
        'content'=>'require',
    ];
    protected $message = [
        'name.require'=>'公告标题不能为空',
        'content.require'=>'公告内容不能为空',
    ];
}