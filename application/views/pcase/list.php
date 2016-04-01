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

        /*以下我添加的*/

        .infobox{

        }
        .infobox tr{
            height: 24px;
            line-height: 24px;
        }

        .infobox tr td,.infobox tr th{
            padding-right: 5px;
            padding-left: 5px;
            position: relative;
            border-top: none;
            border-left: none;
            border-bottom: 1px solid #AEC0C6;
            border-right: 1px solid #AEC0C6;

        }
    </style>
</head>
<body>

<link rel="stylesheet" href="<?php echo STYLE_JS_PATH;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STYLE_JS_PATH;?>/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="<?php echo STYLE_JS_PATH;?>/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo STYLE_JS_PATH;?>/kindeditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="<?php echo STYLE_JS_PATH;?>/kindeditor/plugins/code/prettify.js"></script>

<script>

    KindEditor.ready(function(K) {
        var editor1 = K.create('textarea[name="detail22"]', {
            cssPath : '<?php echo STYLE_JS_PATH;?>/kindeditor/plugins/code/prettify.css',
            uploadJson : '../php/upload_json.php',
            fileManagerJson : '../php/file_manager_json.php',
            allowFileManager : true,
            afterCreate : function() {
                var self = this;
                K.ctrl(document, 13, function() {
                    self.sync();
                    K('form[name=example]')[0].submit();
                });
                K.ctrl(self.edit.doc, 13, function() {
                    self.sync();
                    K('form[name=example]')[0].submit();
                });
            }
        });
        prettyPrint();
    });

</script>


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
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
           onclick="newPcase()">添加</a>
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

<!---添加对话框-->
<div id="dlg"></div>



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
        toolbar: [{
            text: '添加',
            iconCls: 'icon-add',
            handler: function() {
                //openDialog("add_dialog","add");
                $("#dlg").dialog({
                    title:'新增项目',
                    resizable:true,
                    width:850,
                    height:480,
                    href:'<?php echo ADMIN_URL;?>/pcase/add',
                    onOpen:function(){
                     //   cancel['Project'] = $(this);
                     //   cancel['ProjectName'] = $("#Project{$uniqid}");
                    },
                    onClose:function(){
                        //$(this).dialog('destroy');
                        //$("#Project{$uniqid}").datagrid('reload');
                        cancel['Project'] = null;
                        cancel['ProjectName'] = null;
                    }
                });
            }
        }, '-', {
            text: '修改',
            iconCls: 'icon-edit',
            handler: function() {
                openDialog("add_dialog","edit");
            }
        }, '-',{
            text: '删除',
            iconCls: 'icon-remove',
            handler: function(){
                delAppInfo();
            }
        }],
        //toolbar:'#tb'
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

    //添加案例
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
