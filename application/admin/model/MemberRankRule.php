<?php

namespace app\admin\model;

use think\Model;

class MemberRankRule extends Model
{
    // 表名
    protected $name = 'member_rank_rule';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'rank_id_text',
        'rebate_order_type_text',
        'rebate_type_text',
        'rebate_target_text',
        'is_del_text'
    ];
    

    
    //1普通 2白银 3黄金 4钻石
    public function getRankIdList()
    {
        return ['1' => __('Rank_id 1'),'2' => __('Rank_id 2'),'3' => __('Rank_id 3'),'4' => __('Rank_id 4')];
    }

    public function getRebateOrderTypeList()
    {
        return ['insurance' => __('Rebate_order_type insurance'),'member_service' => __('Rebate_order_type member_service')];
    }

    public function getRebateTypeList()
    {
        return ['point' => __('Rebate_type point'),'account' => __('Rebate_type account')];
    }

    public function getRebateTargetList()
    {
        return ['self' => __('Rebate_target self'),'parent' => __('Rebate_target parent')];
    }

    public function getIsDelList()
    {
        return ['0' => __('Is_del 0'),'1' => __('Is_del 1')];
    }


    public function getRankIdTextAttr($value, $data)
    {
        $value = $value ? $value : $data['rank_id'];
        $list = $this->getRankIdList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getRebateOrderTypeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['rebate_order_type'];
        $list = $this->getRebateOrderTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getRebateTypeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['rebate_type'];
        $list = $this->getRebateTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getRebateTargetTextAttr($value, $data)
    {
        $value = $value ? $value : $data['rebate_target'];
        $list = $this->getRebateTargetList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsDelTextAttr($value, $data)
    {
        $value = $value ? $value : $data['is_del'];
        $list = $this->getIsDelList();
        return isset($list[$value]) ? $list[$value] : '';
    }
}
