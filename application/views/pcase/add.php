
<script>
//    //加载插件
//    easyloader.base = '../'; // 设置 easyui 的基本目录
//    easyloader.load('messager', function(){ // 加载指定的模块
//        $.messager.alert('messager', 'load ok');
//    });
//    easyloader.load('form', function(){ // 加载指定的模块
//        $.messager.alert('form', 'load ok');
//    });

</script>


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
<div class="con-tb">
    <form class="projecr-form" id="" method="post">
        <table class="infobox" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="13%"><label for="title">案例名称</label><input id="" type="hidden" value="" /></td>
                <td><input name="title" type="text" class="easyui-validatebox" value="" style="width:30%;" data-options="required:true,validType:'ptext'" /></td>
            </tr>
            <tr>
                <td width="13%"><label for="title">案例类型</label><input id="" type="hidden" value="" /></td>
                <td>
                    <select class="easyui-combobox" name="type" >
                        <option value="AL">PC网站</option>
                        <option value="AK">手机APP</option>
                        <option value="AZ">微信公众号</option>
                        <option value="AR">WAP网站</option>
                        <option value="CA">其他</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="13%"><label for="startdate">案例主图</label></td>
                <td ><input name="startdate" id="" class="easyui-datepicker" data-options="required:true" size="28" autocomplete="off" /> </td>
            </tr>
            <tr>
                <td width="13%"><label for="startdate">案例展示图</label></td>
                <td ><input name="startdate" id="" class="easyui-datepicker" data-options="required:true" size="28" autocomplete="off" /> </td>
            </tr>
            <tr>
                <td width="13%"><label for="client_id">案例简介</label></td>
                <td colspan="3">
                    <textarea name="content" id=""  rows="3"  style="width:99%;" data-options="uploadJson:'__APP__/Public/Upload/save/act/project'"></textarea>
                </td>
            </tr>
            <tr>
                <td width="13%"><label for="contents">案例详情</label></td>
                <td colspan="3">
                    <textarea name="detail22" id=""  rows="18" class="easyui-kindeditor" style="width:99%; height:295px" >{$info.baseinfo.content}</textarea>
                </td>
            </tr>
            <tr>
                <td height="38" colspan="4" align="center">
                        <a href="javascript:void(0);" onclick="javascript:onSubmitProject('{$uniqid}')" id="su" class="easyui-linkbutton" data-options="iconCls:'icon-save'">保存</a>
                    &nbsp; <a href="javascript:void(0);" onclick="javascript:onResetProject('{$uniqid}')" id="re" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'">关闭</a>
                </td>
            </tr>
        </table>
    </form>
</div>

