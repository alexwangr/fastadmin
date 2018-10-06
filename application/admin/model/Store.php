<?php

namespace app\admin\model;

use think\Model;

class Store extends Model
{
    // 表名
    protected $name = 'store';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'def_beihuo_time_text',
        'taxtype_text',
        'state_text',
        'add_time_text',
        'end_time_text',
        'Insert_time_text',
        'month_text',
        'work_stime_text',
        'work_etime_text',
        'freight_text',
        'taxapply_text',
        'is_main_text',
        'store_type_text'
    ];
    
    public function getStoreTypeList(){
        return ['material'=>__('普通商家'),'service'=>__('服务商家'),'material,service'=>__('普通商家,服务商家')];
    }
    
    public function getTaxtypeList()
    {
        return ['3' => __('Taxtype 3')];
    }     

    public function getStateList()
    {
        return ['3) unsigne' => __('3) unsigne')];
    }     

    public function getMonthList()
    {
        return ['3' => __('Month 3')];
    }     

    public function getFreightList()
    {
        return ['3' => __('Freight 3')];
    }     

    public function getTaxapplyList()
    {
        return ['1' => __('Taxapply 1')];
    }     

    public function getIsMainList()
    {
        return ['2' => __('Is_main 2')];
    }     


    public function getDefBeihuoTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['def_beihuo_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getTaxtypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['taxtype'];
        $list = $this->getTaxtypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStateTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['state'];
        $list = $this->getStateList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getAddTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['add_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getEndTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['end_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getInsertTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['Insert_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getMonthTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['month'];
        $list = $this->getMonthList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getWorkStimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['work_stime'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getWorkEtimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['work_etime'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getFreightTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['freight'];
        $list = $this->getFreightList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getTaxapplyTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['taxapply'];
        $list = $this->getTaxapplyList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsMainTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['is_main'];
        $list = $this->getIsMainList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setDefBeihuoTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setAddTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setEndTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setInsertTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setWorkStimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setWorkEtimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    public function getStoreTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['store_type'];
        $list = $this->getStoreTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }
}
