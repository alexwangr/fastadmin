<?php

namespace app\admin\model;

use think\Model;

class Goods extends Model
{
    // 表名
    protected $name = 'goods';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'showtype_text',
        'if_show_text',
        'closed_text',
        'goodstype_text',
        'readytime_text',
        'type_text'
    ];
    
    //material=普通商品、service=服务商品,point=积分商品
    public function getTypeList()
    {
        return ['material' => __('普通商品'),'service' => __('服务商品'),'point' => __('积分商品')];
    }
    
    // 0=销售商家,1=展示商家
    public function getShowtypeList()
    {
        return ['0' => __('销售商家'),'1' => __('展示商家')];
    } 

    //默认为1上架、0为下架
    public function getIfShowList()
    {
        return ['1' => __('上架'),'0' => __('下架')];
    }     

    //0为审核通过,1为待审核,2为审核未通过,3为逻辑删除
    public function getClosedList()
    {
        return ['0' => __('审核通过'),'1' => __('待审核'),'2' => __('审核未通过'),'3' => __('逻辑删除')];
    }     

    public function getGoodstypeList()
    {
        return ['4' => __('Goodstype 4')];
    }     


    public function getShowtypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['showtype'];
        $list = $this->getShowtypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    public function getIfShowTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['if_show'];
        $list = $this->getIfShowList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getClosedTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['closed'];
        $list = $this->getClosedList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getGoodstypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['goodstype'];
        $list = $this->getGoodstypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getReadytimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['readytime'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setReadytimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    public function getTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['type'];
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }
}
