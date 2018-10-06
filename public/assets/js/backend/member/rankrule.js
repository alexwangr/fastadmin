define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'member/rankrule/index',
                    add_url: 'member/rankrule/add',
                    edit_url: 'member/rankrule/edit',
                    del_url: 'member/rankrule/del',
                    multi_url: 'member/rankrule/multi',
                    table: 'member_rank_rule',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'rule_id',
                sortName: 'rule_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'rule_id', title: __('Rule_id')},
                        {field: 'ranks_text', title: __('Rank_id'), operate:false, formatter: Table.api.formatter.label},
                        {field: 'rebate_order_type', title: __('Rebate_order_type'), visible:false, searchList: {"insurance":__('rebate_order_type insurance'),"member_service":__('rebate_order_type member_service')}},
                        {field: 'rebate_order_type_text', title: __('Rebate_order_type'), operate:false},
                        {field: 'rebate_rate', title: __('Rebate_rate'), operate:'BETWEEN'},
                        {field: 'rebate_type', title: __('Rebate_type'), visible:false, searchList: {"point":__('rebate_type point'),"account":__('rebate_type account')}},
                        {field: 'rebate_type_text', title: __('Rebate_type'), operate:false},
                        {field: 'rebate_target', title: __('Rebate_target'), visible:false, searchList: {"self":__('rebate_target self'),"parent":__('rebate_target parent')}},
                        {field: 'rebate_target_text', title: __('Rebate_target'), operate:false},
                        {field: 'rebate_target_level', title: __('Rebate_target_level')},
                        {field: 'rebate_target_rank', title: __('Rebate_target_rank')},
                        {field: 'is_del', title: __('Is_del'), visible:false, searchList: {"0":__('Is_del 0'),"1":__('Is_del 1')}},
                        {field: 'is_del_text', title: __('Is_del'), operate:false},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ],
                    [
                        //点击IP时同时执行搜索此IP
                        {
                            field: 'rank_id',
                            title: __('Rank_id'),
                            events: Controller.api.events.rank_id,
                            formatter: Controller.api.formatter.rank_id
                        }
                    ],
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
            formatter: {//渲染的方法
                rank_id: function (value, row, index) {
                    return '<a class="btn btn-xs btn-rank_id bg-success"><i class="fa fa-map-marker"></i> ' + value + '</a>';
                }
            },
            events: {//绑定事件的方法
                rank_id: {
                    //格式为：方法名+空格+DOM元素
                    'click .btn-rank_id': function (e, value, row, index) {
                        e.stopPropagation();
                        console.log();
                        var container = $("#table").data("bootstrap.table").$container;
                        var options = $("#table").bootstrapTable('getOptions');
                        //这里我们手动将数据填充到表单然后提交
                        $("form.form-commonsearch [name='rank_id']", container).val(value);
                        $("form.form-commonsearch", container).trigger('submit');
                        Toastr.info("执行了自定义搜索操作");
                    }
                }
            }
        }
    };
    return Controller;
});