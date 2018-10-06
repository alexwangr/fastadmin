<?php

namespace app\admin\controller\member;

use app\common\controller\Backend;
use app\admin\model\MemberRank;

/**
 * 会员等级规则管理
 *
 * @icon fa fa-circle-o
 */
class Rankrule extends Backend
{
    
    /**
     * MemberRankRule模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('MemberRankRule');
        $this->view->assign("rankIdList", $this->model->getRankIdList());
        $this->view->assign("rebateOrderTypeList", $this->model->getRebateOrderTypeList());
        $this->view->assign("rebateTypeList", $this->model->getRebateTypeList());
        $this->view->assign("rebateTargetList", $this->model->getRebateTargetList());
        $this->view->assign("isDelList", $this->model->getIsDelList());
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
        if ($this->request->isAjax())
        {
            $rankName = MemberRank::column('rank_id,rank_name');
            list($where, $sort, $order, $offset, $limit) = $this->buildparams(NULL);
            $total = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->count();
            
            $list = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            foreach ($list as $k => &$v)
            {
                $v['ranks'] = $v['rank_id'];
                $v['ranks_text'] = $rankName[$v['rank_id']];
                $rebate_rate = $v['rebate_rate']*100;
                $v['rebate_rate'] = $rebate_rate."%";
            }
            $result = array("total" => $total, "rows" => $list, "extend" => ['id' => 1]);

            return json($result);
        }
        return $this->view->fetch();
    }
}
