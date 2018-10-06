define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/order/index',
                    add_url: 'order/order/add',
                    // edit_url: 'order/order/edit',
                    // del_url: 'order/order/del',
                    multi_url: 'order/order/multi',
                    table: 'order',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'order_id',
                sortName: 'order_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'order_id', title: __('Order_id')},
                        // {field: 'order_sn', title: __('Order_sn')},
                        {field: 'order_sn_main', title: __('Order_sn_main')},
                        // {field: 'tao_order_sn', title: __('Tao_order_sn')},
                        {field: 'type', title: __('Type'), visible:false, searchList: {"material":__('type material'),"service":__('type service'),"insurance":__('type insurance'),"point":__('type point'),"member_service":__('type member_service'),"member_service_rule":__('type member_service_rule')}},
                        {field: 'type_text', title: __('Type'), operate:false},
                        // {field: 'extension', title: __('Extension')},
                        // {field: 'seller_id', title: __('Seller_id')},
                        {field: 'seller_name', title: __('Seller_name')},
                        // {field: 'buyer_id', title: __('Buyer_id')},
                        {field: 'buyer_name', title: __('Buyer_name')},
                        {field: 'status', title: __('Status'), visible:false, searchList: {"0":__('Status 0'),"3":__('Status 3')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'add_time', title: __('Add_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'pay_type', title: __('Pay_type'), visible:false, searchList: {"0":__('Pay_type 0'),"1":__('Pay_type 1'),"2":__('Pay_type 2'),"3":__('Pay_type 3')}},
                        {field: 'pay_type_text', title: __('Pay_type'), operate:false},
                        // {field: 'pay_id', title: __('Pay_id')},
                        {field: 'pay_name', title: __('Pay_name')},
                        {field: 'pay_status', title: __('Pay_status'), visible:false, searchList: {"0":__('Pay_status 0'),"1":__('Pay_status 1'),"2":__('Pay_status 2')}},
                        {field: 'pay_status_text', title: __('Pay_status'), operate:false},
                        {field: 'pay_time', title: __('Pay_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'pay_message', title: __('Pay_message')},
                        // {field: 'ship_time', title: __('Ship_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'invoice_no', title: __('Invoice_no')},
                        // {field: 'invoice_status', title: __('Invoice_status'), visible:false, searchList: {"0":__('Invoice_status 0'),"1":__('Invoice_status 1'),"2":__('Invoice_status 2')}},
                        // {field: 'invoice_status_text', title: __('Invoice_status'), operate:false},
                        // {field: 'invoice_time', title: __('Invoice_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'finished_time', title: __('Finished_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'goods_amount', title: __('Goods_amount'), operate:'BETWEEN'},
                        {field: 'discount', title: __('Discount'), operate:'BETWEEN'},
                        {field: 'order_amount', title: __('Order_amount'), operate:'BETWEEN'},
                        {field: 'order_payed', title: __('Order_payed'), operate:'BETWEEN'},
                        // {field: 'need_invoice', title: __('Need_invoice'), visible:false, searchList: {"2":__('Need_invoice 2')}},
                        // {field: 'need_invoice_text', title: __('Need_invoice'), operate:false},
                        // {field: 'invoice_type', title: __('Invoice_type'), visible:false, searchList: {"1":__('Invoice_type 1')}},
                        // {field: 'invoice_type_text', title: __('Invoice_type'), operate:false},
                        // {field: 'invoice_header', title: __('Invoice_header')},
                        // {field: 'need_shiptime', title: __('Need_shiptime'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'need_shiptime_slot', title: __('Need_shiptime_slot')},
                        // {field: 'evaluation_status', title: __('Evaluation_status'), visible:false, searchList: {"1) unsigne":__('1) unsigne')}},
                        // {field: 'evaluation_status_text', title: __('Evaluation_status'), operate:false},
                        // {field: 'evaluation_time', title: __('Evaluation_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'anonymous', title: __('Anonymous'), visible:false, searchList: {"3) unsigne":__('3) unsigne')}},
                        // {field: 'anonymous_text', title: __('Anonymous'), operate:false},
                        // {field: 'postscript', title: __('Postscript')},
                        // {field: 'pay_alter', title: __('Pay_alter'), visible:false, searchList: {"1) unsigne":__('1) unsigne')}},
                        // {field: 'pay_alter_text', title: __('Pay_alter'), operate:false},
                        // {field: 'mt_flg', title: __('Mt_flg'), visible:false, searchList: {"2":__('Mt_flg 2')}},
                        // {field: 'mt_flg_text', title: __('Mt_flg'), operate:false},
                        // {field: 'statement_status', title: __('Statement_status'), visible:false, searchList: {"2":__('Statement_status 2')}},
                        // {field: 'statement_status_text', title: __('Statement_status'), operate:false},
                        {field: 'source', title: __('Source'), visible:false, searchList: {"0":__('Source 0'),"30":__('Source 30'),"21":__('Source 21'),"82":__('Source 82'),"81":__('Source 81')}},
                        {field: 'source_text', title: __('Source'), operate:false},
                        // {field: 'shipping_id', title: __('Shipping_id')},
                        // {field: 'shipping_fee', title: __('Shipping_fee'), operate:'BETWEEN'},
                        // {field: 'use_coupon_no', title: __('Use_coupon_no')},
                        // {field: 'use_coupon_value', title: __('Use_coupon_value'), operate:'BETWEEN'},
                        // {field: 'timestamp', title: __('Timestamp')},
                        // {field: 'shipping_company', title: __('Shipping_company')},
                        // {field: 'shipping_no', title: __('Shipping_no')},
                        // {field: 'send_receipt_msg', title: __('Send_receipt_msg'), visible:false, searchList: {"1":__('Send_receipt_msg 1')}},
                        // {field: 'send_receipt_msg_text', title: __('Send_receipt_msg'), operate:false},
                        // {field: 'send_deliver_msg', title: __('Send_deliver_msg'), visible:false, searchList: {"1":__('Send_deliver_msg 1')}},
                        // {field: 'send_deliver_msg_text', title: __('Send_deliver_msg'), operate:false},
                        // {field: 'imei', title: __('Imei')},
                        // {field: 'seller_memo', title: __('Seller_memo')},
                        // {field: 'api_order_sn', title: __('Api_order_sn')},
                        // {field: 'printed', title: __('Printed'), visible:false, searchList: {"1":__('Printed 1')}},
                        // {field: 'printed_text', title: __('Printed'), operate:false},
                        {field: 'is_del', title: __('Is_del'), visible:false, searchList: {"0":__('Is_del 0'),"1":__('Is_del 1')}},
                        {field: 'is_del_text', title: __('Is_del'), operate:false},
                        // {field: 'is_add', title: __('Is_add'), visible:false, searchList: {"1":__('Is_add 1')}},
                        // {field: 'is_add_text', title: __('Is_add'), operate:false},
                        // {field: 'remindtime', title: __('Remindtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'sell_site', title: __('Sell_site')},
                        {field: 'admin_id', title: __('Admin_id')},
                        {field: 'operate', title: __('Operate'), table: table, 
                        buttons: [
                            {name: 'detail', text: '详情', title: '详情', icon: 'fa fa-list', classname: 'btn btn-xs btn-primary btn-dialog', url: 'order/order/view'}
                        ],
                        events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        },
        jump: {
            formatter: {
                rule: function (value, row, index) {
                    //这里手动构造URL
                    url = "example/bootstraptable?" + this.field + "=" + value;

                    //方式一,直接返回class带有addtabsit的链接,这可以方便自定义显示内容
                    return '<a href="' + url + '" class="label label-success addtabsit" title="' + __("Search %s", value) + '">' + __('Search %s', value) + '</a>';

                    //方式二,直接调用Table.api.formatter.addtabs
                    return Table.api.formatter.addtabs(value, row, index, url);
                }
            }
        }
    };
    return Controller;
});