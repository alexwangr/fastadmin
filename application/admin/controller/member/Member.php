<?php

namespace app\admin\controller\member;

use app\common\controller\Backend;
use app\admin\model\MemberRank;
/**
 * 会员管理
 *
 * @icon fa fa-circle-o
 */
class Member extends Backend
{
    
    /**
     * Member模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Member');
        $this->view->assign("rankIdList", $this->model->getRankIdList());
        $this->view->assign("genderList", $this->model->getGenderList());
        $this->view->assign("phonecheckedList", $this->model->getPhonecheckedList());
        $this->view->assign("closedList", $this->model->getClosedList());
        $this->view->assign("guanzhuList", $this->model->getGuanzhuList());
        $this->view->assign("isCompanyList", $this->model->getIsCompanyList());
        $this->view->assign("isCompanyMainList", $this->model->getIsCompanyMainList());
        $this->view->assign("cardStatusList", $this->model->getCardStatusList());
        $this->view->assign("sourceList", $this->model->getSourceList());
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
            $rankName = MemberRank::column('rank_id,rank_name');
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            $list = collection($list)->toArray();
            foreach ($list as $k => &$v)
            {
                $v['ranks'] = $v['rank_id'];
                $v['ranks_text'] = $rankName[$v['rank_id']];
            }
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
