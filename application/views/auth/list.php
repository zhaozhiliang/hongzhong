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
        columns:[[
            {field:'id',title:'用户ID',width:100},
            {field:'phone',title:'手机号',width:100},
            {field:'nickname',title:'昵称',width:100,align:'right'},
            {field:'create_time',title:'创建时间',width:100,align:'right'}
        ]]
    });
</script>
</body>
</html>




