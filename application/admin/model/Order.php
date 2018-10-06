<?php

namespace app\admin\model;

use think\Model;

class Order extends Model
{
    // 表名
    protected $name = 'order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'type_text',
        'status_text',
        'add_time_text',
        'pay_type_text',
        'pay_status_text',
        'pay_time_text',
        'ship_time_text',
        'invoice_status_text',
        'invoice_time_text',
        'finished_time_text',
        'need_invoice_text',
        'invoice_type_text',
        'evaluation_status_text',
        'evaluation_time_text',
        'anonymous_text',
        'pay_alter_text',
        'mt_flg_text',
        'statement_status_text',
        'source_text',
        'send_receipt_msg_text',
        'send_deliver_msg_text',
        'printed_text',
        'is_del_text',
        'is_add_text',
        'remindtime_text',
        'distribution_printed_text'
    ];
    

    
    public function getTypeList()
    {
        return ['material' => __('Type material'),'service' => __('Type service'),'insurance' => __('Type insurance'),'point' => __('Type point'),'member_service' => __('Type member_service'),'member_service_rule' => __('Type member_service_rule')];
    }     

    public function getStatusList()
    {
        return ['0' => __('Status 0'),'3' => __('Status 3')];
    }     

    public function getPayTypeList()
    {
        return ['0' => __('Pay_type 0'),'1' => __('Pay_type 1'),'2' => __('Pay_type 2'),'3' => __('Pay_type 3')];
    }     

    public function getPayStatusList()
    {
        return ['0' => __('Pay_status 0'),'1' => __('Pay_status 1'),'2' => __('Pay_status 2')];
    }     

    public function getInvoiceStatusList()
    {
        return ['0' => __('Invoice_status 0'),'1' => __('Invoice_status 1'),'2' => __('Invoice_status 2')];
    }     

    public function getNeedInvoiceList()
    {
        return ['2' => __('Need_invoice 2')];
    }     

    public function getInvoiceTypeList()
    {
        return ['1' => __('Invoice_type 1')];
    }     

    public function getEvaluationStatusList()
    {
        return ['1) unsigne' => __('1) unsigne')];
    }     

    public function getAnonymousList()
    {
        return ['3) unsigne' => __('3) unsigne')];
    }     

    public function getPayAlterList()
    {
        return ['1) unsigne' => __('1) unsigne')];
    }     

    public function getMtFlgList()
    {
        return ['2' => __('Mt_flg 2')];
    }     

    public function getStatementStatusList()
    {
        return ['2' => __('Statement_status 2')];
    }     

    public function getSourceList()
    {
        return ['0' => __('Source 0'),'30' => __('Source 30'),'21' => __('Source 21'),'82' => __('Source 82'),'81' => __('Source 81')];
    }     

    public function getSendReceiptMsgList()
    {
        return ['1' => __('Send_receipt_msg 1')];
    }     

    public function getSendDeliverMsgList()
    {
        return ['1' => __('Send_deliver_msg 1')];
    }     

    public function getPrintedList()
    {
        return ['1' => __('Printed 1')];
    }     

    public function getIsDelList()
    {
        return ['0' => __('Is_del 0'),'1' => __('Is_del 1')];
    }     

    public function getIsAddList()
    {
        return ['1' => __('Is_add 1')];
    }     

    public function getDistributionPrintedList()
    {
        return ['1' => __('Distribution_printed 1')];
    }     


    public function getTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['type'];
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getAddTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['add_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getPayTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['pay_type'];
        $list = $this->getPayTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPayStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['pay_status'];
        $list = $this->getPayStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPayTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['pay_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getShipTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['ship_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getInvoiceStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['invoice_status'];
        $list = $this->getInvoiceStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getInvoiceTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['invoice_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getFinishedTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['finished_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getNeedInvoiceTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['need_invoice'];
        $list = $this->getNeedInvoiceList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getInvoiceTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['invoice_type'];
        $list = $this->getInvoiceTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getEvaluationStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['evaluation_status'];
        $list = $this->getEvaluationStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getEvaluationTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['evaluation_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getAnonymousTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['anonymous'];
        $list = $this->getAnonymousList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPayAlterTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['pay_alter'];
        $list = $this->getPayAlterList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getMtFlgTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['mt_flg'];
        $list = $this->getMtFlgList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatementStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['statement_status'];
        $list = $this->getStatementStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSourceTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['source'];
        $list = $this->getSourceList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSendReceiptMsgTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['send_receipt_msg'];
        $list = $this->getSendReceiptMsgList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSendDeliverMsgTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['send_deliver_msg'];
        $list = $this->getSendDeliverMsgList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPrintedTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['printed'];
        $list = $this->getPrintedList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsDelTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['is_del'];
        $list = $this->getIsDelList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsAddTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['is_add'];
        $list = $this->getIsAddList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getRemindtimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['remindtime'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getDistributionPrintedTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['distribution_printed'];
        $list = $this->getDistributionPrintedList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setAddTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setPayTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setShipTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setInvoiceTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setFinishedTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setEvaluationTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setRemindtimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


}
