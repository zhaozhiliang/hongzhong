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



<table id="dg" class="easyui-datagrid">
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
    <div style="padding:10px 5px; color:#333; font-weight: bold;">订单管理 > 订单管理</div>
    <div style="margin-bottom:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
           onclick="newUser()">添加</a>
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


<!--
<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
<br />
<div id="container">
    <a id="pickfiles" href="javascript:;">选择文件</a>
    <a id="uploadfiles" href="javascript:;">上传</a>
</div>

<br />
<pre id="console"></pre>

<script src="<?php echo STYLE_JS_PATH;?>/plupload/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // Custom example logic

    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles', // you can pass an id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url : '<?php echo ADMIN_URL;?>/pcase/upload',
        flash_swf_url : '<?php echo STYLE_JS_PATH;?>/plupload/Moxie.swf',
        silverlight_xap_url : '<?php echo STYLE_JS_PATH;?>/plupload/Moxie.xap',

        filters : {
            max_file_size : '10mb',
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ]
        },

        init: {
            PostInit: function() {
                document.getElementById('filelist').innerHTML = '';

                document.getElementById('uploadfiles').onclick = function() {
                    uploader.start();
                    return false;
                };
            },

            FilesAdded: function(up, files) {
                plupload.each(files, function(file) {
                    //file文件属性：
//                    id:文件编号,
//                        loaded: 已经上传多少字节,
//                        name: 文件名,
//                        percent: 上传进度,
//                        size: 文件大小,
//                        status: 有四种状态 QUEUED, UPLOADING, FAILED, DONE.对应数值
                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '"></div>';

                    previewImage(file, function (imgsrc) {
                        //alert($("#"+file.id).html());
                        $("#"+file.id).attr("class","t-chuan t-zong");
                        $("#"+file.id).html('<div style="float:left; margin-left:10px;border:1px solid #c9c9c9" ><img  height=\'120px\'  src="' + imgsrc + '" /></div>');
                    })
                });


            },

            UploadProgress: function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";


            },

            Error: function(up, err) {
                document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },

            UploadComplete: function(){

            }
        }
    });

    uploader.init();

    function previewImage(file, callback) {//file为plupload事件监听函数参数中的file对象,callback为预览图片准备完成的回调函数
        if (!file || !/image\//.test(file.type)) return; //确保文件是图片
        if (file.type == 'image/gif') {//gif使用FileReader进行预览,因为mOxie.Image只支持jpg和png
            var fr = new mOxie.FileReader();
            fr.onload = function () {
                callback(fr.result);
                fr.destroy();
                fr = null;
            }
            fr.readAsDataURL(file.getSource());
        } else {
            var preloader = new mOxie.Image();
            preloader.onload = function () {
                preloader.downsize(300, 300);//先压缩一下要预览的图片,宽300，高300
                var imgsrc = preloader.type == 'image/jpeg' ? preloader.getAsDataURL('image/jpeg', 80) : preloader.getAsDataURL(); //得到图片src,实质为一个base64编码的数据
                callback && callback(imgsrc); //callback传入的参数为预览图片的url
                preloader.destroy();
                preloader = null;
            };
            preloader.load(file.getSource());
        }
    }



</script>
-->



<link rel="stylesheet" href="<?php echo STYLE_JS_PATH;?>/kindeditor4110/themes/default/default.css" />
<script charset="utf-8" src="<?php echo STYLE_JS_PATH;?>/kindeditor4110/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo STYLE_JS_PATH;?>/kindeditor4110/lang/zh_CN.js"></script>


<script>
    /*不写这段，初始化有问题*/
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true
        });
    });

</script>


<script>

    //datagrid初始化
    $('#dg').datagrid({
        //title:'应用系统列表',
        iconCls:'icon-edit',//图标
        width: 700,
        height: '800',
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
                    },
                    onLoad:function() {
                        //alert('加载完成！');
                        var editor;
                        KindEditor.ready(function(K) {
                            editor = K.create('textarea[name="content"]', {
                                allowFileManager : true,
                                resizeType : 1,
                                allowPreviewEmoticons : false,
                                allowImageUpload : false,
                                //下面这行代码就是关键的所在，当失去焦点时执行 this.sync();
                                afterBlur: function(){this.sync();},
                                items : [
                                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                                    'insertunorderedlist', '|', 'emoticons', 'image', 'link']
                            });
                        });
                    },
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
