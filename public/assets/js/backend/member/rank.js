define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'member/rank/index',
                    add_url: 'member/rank/add',
                    edit_url: 'member/rank/edit',
                    del_url: 'member/rank/del',
                    multi_url: 'member/rank/multi',
                    table: 'member_rank',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'rank_id',
                sortName: 'rank_id',
                columns: [
                    [
                        {checkbox: true},
                        // {field: 'rank_id', title: __('Rank_id'), searchList: {"3) unsigne":__('3) unsigne')}},
                        {field: 'rank_name', title: __('Rank_name')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'discount_price', title: __('Discount_price'), operate:'BETWEEN'},
                        {field: 'image', title: __('Image'), formatter: Table.api.formatter.image},
                        {field: 'rebate_rate', title: __('Rebate_rate'), operate:'BETWEEN'},
                        {field: 'account_rebate_rate', title: __('Account_rebate_rate'), operate:'BETWEEN'},
                        {
                            field: 'rule_list', 
                            title: '规则列表', 
                            table: table, 
                            events: Table.api.events.operate, 
                            formatter: Controller.api.formatter.rank_id
                        },
                        {
                            field: 'operate', 
                            title: __('Operate'), 
                            table: table, 
                            events: Table.api.events.operate, 
                            formatter: Table.api.formatter.operate
                        }
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
            },
            formatter: {
                rank_id: function (value, row, index) {
                    //这里手动构造URL
                    url = "member/rankrule?rank_id=" + row.rank_id;

                    //方式一,直接返回class带有addtabsit的链接,这可以方便自定义显示内容
                    if(row.rule_num>0){
                        return '<a href="' + url + '" class="btn btn-xs btn-primary btn-addtabs" title="规则列表"><i class="fa fa-flash"></i>规则列表('+row.rule_num+')</a>';
                    }else{
                        return '<a href="' + url + '" class="btn btn-xs btn-default disabled btn-addtabs" title="规则列表"><i class="fa fa-flash"></i>规则列表('+row.rule_num+')</a>';
                    }

                    //方式二,直接调用Table.api.formatter.addtabs
                    return Table.api.formatter.addtabs(value, row, index, url);
                }
            }
        }
    };
    return Controller;
});