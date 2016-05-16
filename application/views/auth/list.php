<html>
<head>
    <title>管理员列表</title>
    <link href="<?php echo STYLE_CSS_PATH ;?>/base.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo STYLE_JS_PATH ;?>/jquery-easyui-1.4.5/themes/bootstrap/easyui.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo STYLE_JS_PATH ;?>/jquery-easyui-1.4.5/themes/icon.css" rel="stylesheet" type="text/css" />


    <script src="<?php echo STYLE_JS_PATH;?>/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo STYLE_JS_PATH;?>/jquery-easyui-1.4.5/jquery.easyui.min.js" type="text/javascript"></script>
    <script src="<?php echo STYLE_JS_PATH;?>/jquery-easyui-1.4.5/locale/easyui-lang-zh_CN.js" type="text/javascript"></script>
</head>
<body>


<table id="dg" class="easyui-datagrid" ></table>

<script>
    $('#dg').datagrid({
        url:'<?php echo ADMIN_URL;?>/admin/ajaxGetList',
        fitColumns:true,
        resizeHandle:'right', //调整列的位置
        autoRowHeight: true,  //是否自动行的高度
        columns:[[
            {field:'id',title:'用户ID',width:100,align:'center',
                sortable:true,order:'desc',
                styler:function(value,row,index){
                    if(value<3){
                        return 'background-color:#ffee00;color:red;';
                    }
                }},
            {field:'phone',title:'手机号',width:150,align:'center'},
            {field:'nickname',title:'昵称',width:150,align:'center'},
            {field:'status_cn',title:'状态',width:100,align:'center'},
            {field:'last_time',title:'上次登录时间',width:200,align:'center',
                styler:function(value,row,index){
                    if(value > '2016-05-16'){
                        return 'background-color:#ffee00;color:red;';
                    }
                }
                },
            {field:'create_time',title:'创建时间',width:200,align:'center'}
        ]],
        striped: true, //是否显示斑马线效果
        nowrap:true, //是否换行，true(不换行)的性能高
        idField:'id',
        loadMsg:'努力加载中，请稍等！', //远程加载时的提示消息
        pagination:true, //是否显示分页
        sortName : 'id',
        multiSort: true,
        remoteSort: true, //定义从服务器对数据排序
        showHeader: true, //定义是否显示行头
        showFooter: true, //定义是否显示行脚
        //scrollbarSize: 20, //滚动条的宽度
        onClickRow:onClickRow, //点击事件
        rowStyler:function(index,row){
            if(row.id  > 8){
                return 'background-color:#6293BB;color:#fff;';
            }
        },
        toolbar:[{
            iconCls:'icon-edit',
            handler:function(){
                alert('编辑按钮');
            }
        },'-',{
            iconCls:'icon-help',
            handler:function(){
                alert('帮助按钮');
            }
        }]
    });



    var editIndex = undefined;
    function endEditing(){
        if (editIndex == undefined){return true}
        if ($('#dg').datagrid('validateRow', editIndex)){
            var ed = $('#dg').datagrid('getEditor', {index:editIndex,field:'id'});
            //var productname = $(ed.target).combobox('getText');
            //$('#dg').datagrid('getRows')[editIndex]['productname'] = productname;
            $('#dg').datagrid('endEdit', editIndex);
            editIndex = undefined;
            return true;
        } else {
            return false;
        }
    }

    function onClickRow(index){
        //alert(123);
        if (editIndex != index){
            if (endEditing()){
                $('#dg').datagrid('selectRow', index)
                    .datagrid('beginEdit', index);
                editIndex = index;
            } else {
                $('#dg').datagrid('selectRow', editIndex);
            }
        }
    }


</script>
</body>
</html>




