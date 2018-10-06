define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'member/member/index',
                    add_url: 'member/member/add',
                    edit_url: 'member/member/edit',
                    del_url: 'member/member/del',
                    multi_url: 'member/member/multi',
                    table: 'member',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'user_id',
                sortName: 'user_id',
                columns: [
                    [
                        {checkbox: true},
                        // {field: 'user_id', title: __('User_id')},
                        {field: 'user_name', title: __('User_name')},
                        {field: 'real_name', title: __('Real_name')},
                        {field: 'nick_name', title: __('Nick_name')},
                        {field: 'ranks_text', title: __('Rank_id'), operate:false, formatter: Table.api.formatter.label},
                        {field: 'gender', title: __('Gender'), visible:false, searchList: {"3) unsigne":__('3) unsigne')}},
                        {field: 'gender_text', title: __('Gender'), operate:false},
                        {field: 'birthday', title: __('Birthday'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'password', title: __('Password')},
                        {field: 'phone_mob', title: __('Phone_mob')},
                        // {field: 'email', title: __('Email')},
                        // {field: 'email_checked', title: __('Email_checked')},
                        // {field: 'email_check_time', title: __('Email_check_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'region_id', title: __('Region_id')},
                        // {field: 'region_name', title: __('Region_name')},
                        // {field: 'address', title: __('Address')},
                        // {field: 'post', title: __('Post')},
                        // {field: 'im_qq', title: __('Im_qq')},
                        {field: 'reg_time', title: __('Reg_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'PhoneCheckCode', title: __('Phonecheckcode')},
                        // {field: 'PhoneChecktime', title: __('Phonechecktime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'PhoneChecked', title: __('Phonechecked'), visible:false, searchList: {"3":__('Phonechecked 3')}},
                        // {field: 'PhoneChecked_text', title: __('Phonechecked'), operate:false},
                        // {field: 'liveState', title: __('Livestate')},
                        // {field: 'portrait', title: __('Portrait')},
                        // {field: 'closed', title: __('Closed'), visible:false, searchList: {"3":__('Closed 3')}},
                        // {field: 'closed_text', title: __('Closed'), operate:false},
                        // {field: 'closed_reason', title: __('Closed_reason')},
                        // {field: 'guanzhu', title: __('Guanzhu'), visible:false, searchList: {"3) unsigne":__('3) unsigne')}},
                        // {field: 'guanzhu_text', title: __('Guanzhu'), operate:false},
                        // {field: 'guanzhu_desc', title: __('Guanzhu_desc')},
                        // {field: 'bumen', title: __('Bumen')},
                        // {field: 'is_company', title: __('Is_company'), visible:false, searchList: {"1":__('Is_company 1')}},
                        // {field: 'is_company_text', title: __('Is_company'), operate:false},
                        // {field: 'is_company_main', title: __('Is_company_main'), visible:false, searchList: {"1":__('Is_company_main 1')}},
                        // {field: 'is_company_main_text', title: __('Is_company_main'), operate:false},
                        // {field: 'store_id', title: __('Store_id')},
                        // {field: 'card_no', title: __('Card_no')},
                        // {field: 'card_status', title: __('Card_status'), visible:false, searchList: {"3":__('Card_status 3')}},
                        // {field: 'card_status_text', title: __('Card_status'), operate:false},
                        // {field: 'card_secret', title: __('Card_secret')},
                        {field: 'source', title: __('Source'), visible:false, searchList: {"1":__('Source 1')}},
                        {field: 'source_text', title: __('Source'), operate:false},
                        // {field: 'wxopenid', title: __('Wxopenid')},
                        // {field: 'bihu_custkey', title: __('Bihu_custkey')},
                        // {field: 'vip_end_time', title: __('Vip_end_time')},
                        // {field: 'login_id', title: __('Login_id')},
                        // {field: 'timestamp', title: __('Timestamp')},
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