<?php

namespace app\admin\controller\goods;

use app\common\controller\Backend;
use app\admin\model\Gcategory;

/**
 * 商品主管理
 *
 * @icon fa fa-circle-o
 */
class Goods extends Backend
{
    
    /**
     * Goods模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Goods');
        $this->view->assign("typeList", $this->model->getTypeList());
        $this->view->assign("showtypeList", $this->model->getShowtypeList());
        $this->view->assign("ifShowList", $this->model->getIfShowList());
        $this->view->assign("closedList", $this->model->getClosedList());
        $this->view->assign("goodstypeList", $this->model->getGoodstypeList());
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
            $cateName = Gcategory::column('cate_id,cate_name');
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
                $v['cate_name_text'] = $cateName[$v['cate_id']];
            }
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
