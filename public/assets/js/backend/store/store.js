define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'store/store/index',
                    add_url: 'store/store/add',
                    edit_url: 'store/store/edit',
                    del_url: 'store/store/del',
                    multi_url: 'store/store/multi',
                    table: 'store',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'store_id',
                sortName: 'store_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'store_id', title: __('Store_id')},
                        {field: 'contract_id', title: __('Contract_id')},
                        {field: 'store_name', title: __('Store_name')},
                        // {field: 'store_type', title: __('Store_type')},
                        {field: 'store_type_text', title: __('Store_type'), operate:false},
                        {field: 'owner_name', title: __('Owner_name')},
                        {field: 'owner_card', title: __('Owner_card')},
                        {field: 'owner_mob', title: __('Owner_mob')},
                        {field: 'company_name', title: __('Company_name')},
                        {field: 'address', title: __('Address')},
                        // {field: 'company_certificates', title: __('Company_certificates')},
                        {field: 'company_products', title: __('Company_products')},
                        {field: 'contact_business', title: __('Contact_business')},
                        {field: 'tel_business', title: __('Tel_business')},
                        // {field: 'contact_finance', title: __('Contact_finance')},
                        // {field: 'tel_finance', title: __('Tel_finance')},
                        // {field: 'address_finance', title: __('Address_finance')},
                        // {field: 'finance_bank_name', title: __('Finance_bank_name')},
                        // {field: 'finance_bank', title: __('Finance_bank')},
                        // {field: 'finance_account', title: __('Finance_account')},
                        // {field: 'finance_bond', title: __('Finance_bond')},
                        // {field: 'finance_service', title: __('Finance_service')},
                        // {field: 'finance_company_type', title: __('Finance_company_type')},
                        // {field: 'active_commission', title: __('Active_commission'), operate:'BETWEEN'},
                        // {field: 'default_commission', title: __('Default_commission'), operate:'BETWEEN'},
                        // {field: 'default_tax', title: __('Default_tax'), operate:'BETWEEN'},
                        // {field: 'def_beihuo_time', title: __('Def_beihuo_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'taxtype', title: __('Taxtype'), visible:false, searchList: {"3":__('Taxtype 3')}},
                        // {field: 'taxtype_text', title: __('Taxtype'), operate:false},
                        // {field: 'store_logo', title: __('Store_logo')},
                        // {field: 'state', title: __('State'), visible:false, searchList: {"3) unsigne":__('3) unsigne')}},
                        // {field: 'state_text', title: __('State'), operate:false},
                        // {field: 'close_reason', title: __('Close_reason')},
                        // {field: 'add_time', title: __('Add_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'end_time', title: __('End_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'certification', title: __('Certification')},
                        // {field: 'sort_order', title: __('Sort_order')},
                        // {field: 'im_qq', title: __('Im_qq')},
                        // {field: 'store_title', title: __('Store_title')},
                        // {field: 'store_keywords', title: __('Store_keywords')},
                        // {field: 'store_description', title: __('Store_description')},
                        // {field: 'Insert_time', title: __('Insert_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'last_update', title: __('Last_update')},
                        // {field: 'transfer_tel', title: __('Transfer_tel')},
                        // {field: 'month', title: __('Month'), visible:false, searchList: {"3":__('Month 3')}},
                        // {field: 'month_text', title: __('Month'), operate:false},
                        // {field: 'store_info', title: __('Store_info')},
                        // {field: 'work_stime', title: __('Work_stime')},
                        // {field: 'work_etime', title: __('Work_etime')},
                        // {field: 'freight', title: __('Freight'), visible:false, searchList: {"3":__('Freight 3')}},
                        // {field: 'freight_text', title: __('Freight'), operate:false},
                        // {field: 'timestamp', title: __('Timestamp')},
                        // {field: 'taxapply', title: __('Taxapply'), visible:false, searchList: {"1":__('Taxapply 1')}},
                        // {field: 'taxapply_text', title: __('Taxapply'), operate:false},
                        // {field: 'longitude', title: __('Longitude')},
                        // {field: 'latitude', title: __('Latitude')},
                        // {field: 'is_main', title: __('Is_main'), visible:false, searchList: {"2":__('Is_main 2')}},
                        // {field: 'is_main_text', title: __('Is_main'), operate:false},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
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
        }
    };
    return Controller;
});