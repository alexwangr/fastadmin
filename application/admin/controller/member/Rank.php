<?php

namespace app\admin\controller\member;

use app\common\controller\Backend;

/**
 * 会员等级管理
 *
 * @icon fa fa-circle-o
 */
class Rank extends Backend
{
    
    /**
     * MemberRank模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('MemberRank');

    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    
    /**
     * 查看
     */
    public function index()
    {
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->field('a.rank_id,a.rank_name,a.price,a.discount_price,a.image,a.rebate_rate,a.account_rebate_rate,COUNT(b.rule_id) AS rule_num')
                    ->alias('a')
                    ->join('member_rank_rule b', 'a.rank_id=b.rank_id', 'LEFT')
                    ->where($where)
                    ->group('a.rank_id')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}