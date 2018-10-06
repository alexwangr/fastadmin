<?php

namespace app\admin\controller\order;

use app\common\controller\Backend;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Order extends Backend
{
    
    /**
     * Order模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Order');
        $this->view->assign("typeList", $this->model->getTypeList());
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("payTypeList", $this->model->getPayTypeList());
        $this->view->assign("payStatusList", $this->model->getPayStatusList());
        $this->view->assign("invoiceStatusList", $this->model->getInvoiceStatusList());
        $this->view->assign("needInvoiceList", $this->model->getNeedInvoiceList());
        $this->view->assign("invoiceTypeList", $this->model->getInvoiceTypeList());
        $this->view->assign("evaluationStatusList", $this->model->getEvaluationStatusList());
        $this->view->assign("anonymousList", $this->model->getAnonymousList());
        $this->view->assign("payAlterList", $this->model->getPayAlterList());
        $this->view->assign("mtFlgList", $this->model->getMtFlgList());
        $this->view->assign("statementStatusList", $this->model->getStatementStatusList());
        $this->view->assign("sourceList", $this->model->getSourceList());
        $this->view->assign("sendReceiptMsgList", $this->model->getSendReceiptMsgList());
        $this->view->assign("sendDeliverMsgList", $this->model->getSendDeliverMsgList());
        $this->view->assign("printedList", $this->model->getPrintedList());
        $this->view->assign("isDelList", $this->model->getIsDelList());
        $this->view->assign("isAddList", $this->model->getIsAddList());
        $this->view->assign("distributionPrintedList", $this->model->getDistributionPrintedList());

        $this->orderOfferModel = model('OrderOffer');
        $this->orderInsuranceModel = model('OrderInsurance');
        $this->orderInsuranceListModel = model('OrderInsuranceList');
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
                    ->where('type','=','insurance')
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->where($where)
                    ->where('type','=','insurance')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
    
    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
        if (!$row)
            $this->error(__('No Results were found'));
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds))
        {
            if (!in_array($row[$this->dataLimitField], $adminIds))
            {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            if ($params)
            {
                try
                {
                    //是否采用模型验证
                    if ($this->modelValidate)
                    {
                        $name = basename(str_replace('\\', '/', get_class($this->model)));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : true) : $this->modelValidate;
                        $row->validate($validate);
                    }
                    $result = $row->allowField(true)->save($params);
                    if ($result !== false)
                    {
                        $this->success();
                    }
                    else
                    {
                        $this->error($row->getError());
                    }
                }
                catch (\think\exception\PDOException $e)
                {
                    $this->error($e->getMessage());
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    /**
     * 编辑
     */
    public function view($ids = NULL)
    {
        $row = $this->model->get($ids);
        if (!$row)
            $this->error(__('No Results were found'));
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds))
        {
            if (!in_array($row[$this->dataLimitField], $adminIds))
            {
                $this->error(__('You have no permission'));
            }
        }

        $orderInsurance = $this->orderInsuranceModel->where("order_id=".$ids)->find();
        if (!$orderInsurance)
            $this->error(__('No Results were found'));
        $offer_id = $orderInsurance['offer_id'];
        $bihu_insurance_list = "";
        if($offer_id){
            $orderOffer = $this->orderOfferModel->get($offer_id);
            if (!$orderOffer)
                $this->error(__('No Results were found'));
            $bihu_insurance_list = $orderOffer['bihu_insurance_list'];
        }
        if($bihu_insurance_list && count(unserialize($bihu_insurance_list))>0){
            $insuranceList=unserialize($bihu_insurance_list);
            foreach ($insuranceList as &$v) {
                $v['order_id']=$ids;
                $v['real_insurance_price']=$v['insurance_price'];
                $oiitem=$this->orderInsuranceListModel->get($v['id']);
                $v['insurance_price'] = $oiitem['insurance_price'];
            }
        }else{
            $orderInsuranceList=$this->orderInsuranceListModel
            ->where("order_id=".$ids)
            ->select();
            $insuranceList = array();
            foreach ($orderInsuranceList as $k => $oi) {
                $insuranceList[] = array(
                    'order_id'=>$oi['order_id'],
                    'insurance_name'=>$oi['insurance_name'],
                    'insurance_price'=>$oi['insurance_price'],
                    'real_insurance_price'=>0
                );
            }
        }
        $this->view->assign("row", $row);
        $this->view->assign("insuranceList", $insuranceList);
        return $this->view->fetch();
    }
}
