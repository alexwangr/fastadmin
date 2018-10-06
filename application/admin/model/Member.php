<?php

namespace app\admin\model;

use think\Model;

class Member extends Model
{
    // 表名
    protected $name = 'member';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'rank_id_text',
        'gender_text',
        'reg_time_text',
        'PhoneChecktime_text',
        'PhoneChecked_text',
        'closed_text',
        'guanzhu_text',
        'is_company_text',
        'is_company_main_text',
        'card_status_text',
        'source_text',
        'vip_end_time_text'
    ];
    

    //1普通 2白银 3黄金 4钻石
    public function getRankIdList()
    {
        return ['1' => __('Rank_id 1'),'2' => __('Rank_id 2'),'3' => __('Rank_id 3'),'4' => __('Rank_id 4')];
    }     

    //性别 0=女 1=男
    public function getGenderList()
    {
        return ['0' => __('Gender 0'),'1' => __('Gender 1')];
    }     

    public function getPhonecheckedList()
    {
        return ['3' => __('Phonechecked 3')];
    }     

    public function getClosedList()
    {
        return ['3' => __('Closed 3')];
    }     

    public function getGuanzhuList()
    {
        return ['3) unsigne' => __('3) unsigne')];
    }     

    public function getIsCompanyList()
    {
        return ['1' => __('Is_company 1')];
    }     

    public function getIsCompanyMainList()
    {
        return ['1' => __('Is_company_main 1')];
    }     

    public function getCardStatusList()
    {
        return ['3' => __('Card_status 3')];
    }     

    public function getSourceList()
    {
        return ['1' => __('Source 1'),'2' => __('Source 2')];
    }     


    public function getRankIdTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['rank_id'];
        $list = $this->getRankIdList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getGenderTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['gender'];
        $list = $this->getGenderList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getRegTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['reg_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getPhonechecktimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['PhoneChecktime'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getPhonecheckedTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['PhoneChecked'];
        $list = $this->getPhonecheckedList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getClosedTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['closed'];
        $list = $this->getClosedList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getGuanzhuTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['guanzhu'];
        $list = $this->getGuanzhuList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsCompanyTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['is_company'];
        $list = $this->getIsCompanyList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsCompanyMainTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['is_company_main'];
        $list = $this->getIsCompanyMainList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getCardStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['card_status'];
        $list = $this->getCardStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSourceTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['source'];
        $list = $this->getSourceList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getVipEndTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['vip_end_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setRegTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setPhonechecktimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setVipEndTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


}
