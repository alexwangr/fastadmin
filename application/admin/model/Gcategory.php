<?php

namespace app\admin\model;

use think\Model;

class Gcategory extends Model
{
    // 表名
    protected $name = 'gcategory';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'type_text',
        'if_show_text'
    ];
    

    /**
     * 读取分类类型
     * @return array
     */
    public static function getTypeList()
    {
        $typeList = config('site.gcategorytype');
        foreach ($typeList as $k => &$v) {
            $v = __($v);
        }
        return $typeList;
    }

    // 0=不显示,1=显示
    public function getIfshowList()
    {
        return ['1' => __('显示'),'0' => __('不显示')];
    }

    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['type'];
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    public function getIfshowTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['if_show'];
        $list = $this->getIfshowList();
        return isset($list[$value]) ? $list[$value] : '';
    }
}
