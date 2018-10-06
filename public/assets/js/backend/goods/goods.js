define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'goods/goods/index',
                    add_url: 'goods/goods/add',
                    edit_url: 'goods/goods/edit',
                    del_url: 'goods/goods/del',
                    multi_url: 'goods/goods/multi',
                    table: 'goods',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'goods_id',
                sortName: 'goods_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'goods_id', title: __('Goods_id')},
                        {field: 'store_id', title: __('Store_id')},
                        // {field: 'type', title: __('Type')},
                        {field: 'type_text', title: __('Type'), operate:false},
                        // {field: 'showtype', title: __('Showtype'), visible:false, searchList: {"4":__('Showtype 4')}},
                        // {field: 'showtype_text', title: __('Showtype'), operate:false},
                        {field: 'goods_name', title: __('Goods_name')},
                        // {field: 'spec_qty', title: __('Spec_qty'), visible:false, searchList: {"4) unsigne":__('4) unsigne')}},
                        // {field: 'spec_qty_text', title: __('Spec_qty'), operate:false},
                        // {field: 'spec_name_1', title: __('Spec_name_1')},
                        // {field: 'spec_name_2', title: __('Spec_name_2')},
                        // {field: 'if_show', title: __('If_show'), visible:false, searchList: {"3) unsigne":__('3) unsigne')}},
                        {field: 'if_show_text', title: __('If_show'), operate:false},
                        // {field: 'closed', title: __('Closed'), visible:false, searchList: {"3) unsigne":__('3) unsigne')}},
                        // {field: 'closed_text', title: __('Closed'), operate:false},
                        {field: 'default_image', title: __('Default_image'), formatter: Table.api.formatter.image},
                        // {field: 'point', title: __('Point')},
                        // {field: 'tax', title: __('Tax'), operate:'BETWEEN'},
                        // {field: 'commission', title: __('Commission'), operate:'BETWEEN'},
                        // {field: 'cate_id', title: __('Cate_id')},
                        // {field: 'cate_id_1', title: __('Cate_id_1')},
                        // {field: 'cate_id_2', title: __('Cate_id_2')},
                        // {field: 'cate_id_3', title: __('Cate_id_3')},
                        {field: 'cate_name_text', title: __('Cate_name')},
                        // {field: 'brand_id', title: __('Brand_id')},
                        // {field: 'brand', title: __('Brand')},
                        // {field: 'goodstype', title: __('Goodstype'), visible:false, searchList: {"4":__('Goodstype 4')}},
                        // {field: 'goodstype_text', title: __('Goodstype'), operate:false},
                        // {field: 'add_name', title: __('Add_name')},
                        // {field: 'readytime', title: __('Readytime'), searchList: {"3":__('readytime 3')}},
                        // {field: 'keep_alive', title: __('Keep_alive')},
                        {field: 'timestamp', title: __('Timestamp')},
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