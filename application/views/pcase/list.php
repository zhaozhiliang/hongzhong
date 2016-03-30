<!DOCTYPE html>
<html>
<head>
    <title>应用配置</title>
    <link href="<?php echo STYLE_CSS_PATH;?>/base.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo STYLE_JS_PATH;?>/easyui/1.3.2/themes/bootstrap/easyui.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo STYLE_JS_PATH;?>/easyui/1.3.2/themes/icon.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        #fm .fitem {
            width: 300px;
            margin: 10px auto;
        }

        #fm .fitem label {
            width: 120px;
            display: inline-block;
        }

        .toolbar-condition td{
            padding-right: 10px;
        }
    </style>
</head>
<body>

<!--
<table id="dg" class="easyui-datagrid"
       data-options="
        fit:true,
        toolbar:'#tb',
        url:'/CustomNav/GetPageByAppConfig',
        rownumbers:true,
        singleSelect:true,
        autoRowHeight:false,
        pagination:true,
        fitColumns:true,
        pageSize:20">
    <thead>
    <tr>
        <th data-options="">用户编号</th>
        <th data-options="">用户帐号</th>
        <th data-options="">学生/回访/添加</th>
        <th data-options="">课程名称</th>
        <th data-options="">支付状态</th>
        <th data-options="">咨询师</th>
        <th data-options="">操作</th>
    </tr>
    </thead>
</table>
-->

<table id="dg" class="easyui-datagrid" title=""
       data-options="rownumbers:true,
       singleSelect:true,
       url:'<?php echo ADMIN_URL;?>/pcase/ajaxGetList',
       method:'get',
       toolbar:'#tb'">
    <thead>
    <tr>
        <th data-options="field:'id',width:80">案例ID</th>
        <th data-options="field:'title',width:200">标题</th>
        <th data-options="field:'master_img',width:120,align:'center'">主图</th>
        <th data-options="field:'status_cn',width:60,align:'center'">状态</th>
        <th data-options="field:'ctime',width:120,align:'center'">创建时间</th>
        <th data-options="field:'',width:60,align:'center'">操作</th>
    </tr>
    </thead>
</table>


<div id="tb" style="padding:5px;height:auto">
    <div style="padding:10px 5px; color:#333; font-weight: bold;">案例管理 > 案例列表</div>
    <div style="margin-bottom:5px">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
           onclick="newUser()">添加</a>-->
        <a href="<?php echo ADMIN_URL?>/pcase/add" class="easyui-linkbutton" iconCls="icon-add" plain="true"
          >添加</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editUser()">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="destroyUser()">删除</a>
    </div>
    <div>
        <table class="toolbar-condition">
            <tr>
                <td>开始时间：</td>
                <td><input class="easyui-datebox" style="width:100px"></td>
                <td>到：</td>
                <td><input class="easyui-datebox" style="width:100px"></td>
                <td>语言：</td>
                <td>
                    <select class="easyui-combobox" panelHeight="auto" style="width:100px">
                        <option value="java">Java</option>
                        <option value="c">C</option>
                        <option value="basic">Basic</option>
                        <option value="perl">Perl</option>
                        <option value="python">Python</option>
                    </select>
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-search">搜索</a>
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="dlg" class="easyui-dialog" title="&nbsp;添加"
     data-options="iconCls:'icon-add',buttons:'#dlg-buttons',closed:true,modal:true"
     style="width:400px; padding:10px 20px;">
    <div class="dlg-info">应用配置</div>
    <form id="fm" method="post" novalidate>
        <input type="hidden" name="Id"/>
        <input type="hidden" name="IsDelete" value="False"/>

        <div class="fitem">
            <label>应用程序:</label>
            <input name="App" class="easyui-validatebox" required="true">
        </div>
        <div class="fitem">
            <label>平台ID:</label>
            <input name="PlatformId" class="easyui-validatebox" required="true">
        </div>
        <div class="fitem">
            <label>版本:</label>
            <input name="Version" class="easyui-validatebox" required="true">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="saveUser()">确定</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>

<script src="<?php echo STYLE_JS_PATH;?>/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo STYLE_JS_PATH;?>/easyui/1.3.2/jquery.easyui.min.js" type="text/javascript"></script>
<script src="<?php echo STYLE_JS_PATH;?>/easyui/1.3.2/locale/easyui-lang-zh_CN.js" type="text/javascript"></script>
<script>

    //datagrid初始化
    $('#dg').datagrid({
        //title:'应用系统列表',
        iconCls:'icon-edit',//图标
        width: 700,
        height: 'auto',
        nowrap: false,
        striped: true,
        border: true,
        collapsible:false,//是否可折叠的
        fit: true,//自动大小
        url:'<?php echo ADMIN_URL;?>/pcase/ajaxGetList',
        //sortName: 'code',
        //sortOrder: 'desc',
        remoteSort:false,
        idField:'fldId',
        singleSelect:false,//是否单选
        pagination:true,//分页控件
        rownumbers:true,//行号
        frozenColumns:[[
            {field:'ck',checkbox:true}
        ]],
//        toolbar: [{
//            text: '添加',
//            iconCls: 'icon-add',
//            handler: function() {
//                openDialog("add_dialog","add");
//            }
//        }, '-', {
//            text: '修改',
//            iconCls: 'icon-edit',
//            handler: function() {
//                openDialog("add_dialog","edit");
//            }
//        }, '-',{
//            text: '删除',
//            iconCls: 'icon-remove',
//            handler: function(){
//                delAppInfo();
//            }
//        }],
        toolbar:'#tb'
    });
    //设置分页控件
    var p = $('#dg').datagrid('getPager');
    $(p).pagination({
        pageSize: 5,//每页显示的记录条数，默认为10
        pageList: [5,10,15],//可以设置每页记录条数的列表
        beforePageText: '第',//页数文本框前显示的汉字
        afterPageText: '页    共 {pages} 页',
        displayMsg: '当前显示 {from} - {to} 条记录   共 {total} 条记录',
        /*onBeforeRefresh:function(){
         $(this).pagination('loading');
         alert('before refresh');
         $(this).pagination('loaded');
         }*/
    });
</script>
<script type="text/javascript">
    var url;
    function newUser() {
        $('#dlg').dialog('open').dialog('setTitle', '添加');
        $('#fm').form('clear');
        url = '/CustomNav/CreateByAppConfig';
    }
    function editUser() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('setTitle', '编辑');
            $('#fm').form('load', row);
            url = '/CustomNav/UpdateByAppConfig';
        } else {
            $.messager.show({
                title: '提示信息',
                msg: '没有选中的项！'
            });
        }
    }
    function destroyUser() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $.messager.confirm('提示信息', '你真的需要删除该数据吗?', function (r) {
                if (r) {
                    $.post('/CustomNav/DeleteByAppConfig', {id: row.Id}, function (result) {
                        if (result == 'ok') {
                            $('#dg').datagrid('reload');
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: result
                            });
                        }
                    });
                }
            });
        } else {
            $.messager.show({
                title: '提示信息',
                msg: '没有选中的项！'
            });
        }
    }
    function saveUser() {
        $('#fm').form('submit', {
            url: url,
            onSubmit: function () {
                return $(this).form('validate');
            },
            success: function (result) {
                if (result != 'ok') {
                    $.messager.show({
                        title: '提示信息',
                        msg: '操作失败！'
                    });
                } else {
                    $('#dlg').dialog('close');
                    $('#dg').datagrid('reload');
                }
            }
        });
    }
</script>
</body>
</html>
