<div class="con-tb">
    <form class="projecr-form" id="projecr-form" action="/lmm7xyx/pcase/doAdd" id="" method="post" enctype="multipart/form-data">
        <table class="infobox" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="13%"><label for="title">案例名称</label><input id="" type="hidden" value="" /></td>
                <td><input name="title" type="text" class="easyui-validatebox" value="" style="width:30%;" data-options="required:true,validType:'ptext'" /></td>
            </tr>
            <tr>
                <td width="13%"><label for="title">案例类型</label></td>
                <td>
                    <select class="easyui-combobox" name="type" >
                        <option value="0">PC网站</option>
                        <option value="1">手机APP</option>
                        <option value="2">微信公众号</option>
                        <option value="3">WAP网站</option>
                        <option value="4">其他</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="13%"><label for="startdate">案例主图</label></td>
                <td >
                    <div id="filelist_master" style="height: auto;">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <br />
                    <div id="container_master" style="clear:both; margin: 20px 0px 0px 12px;">
                        <!--<a id="pickfiles" href="javascript:;">选择文件</a>-->
                        <a id="pickfiles_master" href="javascript:;" class="easyui-linkbutton">选择文件</a>
                        <span style="color:red">只能上传一张！</span>
                        <!--<a id="uploadfiles_master" href="javascript:;" class="easyui-linkbutton" style="margin-left: 20px;">上传</a>-->
                    </div>

                    <br />
                    <pre id="console_master"></pre>
                </td>
            </tr>
            <tr>
                <td width="13%"><label for="startdate">案例展示图</label></td>
                <td>
                    <div id="filelist" style="height: auto;">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <br />
                    <div id="container" style="clear:both; margin: 20px 0px 0px 12px;">
                        <!--<a id="pickfiles" href="javascript:;">选择文件</a>-->
                        <a id="pickfiles" href="javascript:;" class="easyui-linkbutton">选择文件</a>
                        <!--<a id="uploadfiles" href="javascript:;" class="easyui-linkbutton" style="margin-left: 20px;">上传</a>-->
                        <span style="color:red">至少上传一张！</span>
                    </div>

                    <br />
                    <pre id="console"></pre>
                </td>

            </tr>
            <tr>
                <td width="13%"><label for="client_id">案例简介</label></td>
                <td>
                    <textarea name="profile" id="profile"  rows="3"  style="width:99%;" class="easyui-validatebox"  data-options="required:true,validType:'ptext'"></textarea>
                </td>
            </tr>
            <tr>
                <td width="13%"><label for="contents">案例详情</label></td>
                <td>
                    <textarea name="content" id="content"  rows="18" class="easyui-kindeditor" style="width:99%; height:295px" ></textarea>
                </td>
            </tr>
            <tr>
                <td height="38" colspan="2" align="center">
                       <a href="javascript:void(0);" onclick="javascript:onSubmitProject('')" id="su" class="easyui-linkbutton" data-options="iconCls:'icon-save'">保存</a>
                    &nbsp; <a href="javascript:void(0);" onclick="javascript:onResetProject('')" id="re" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'">关闭</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="master_img_input"></div>
                    <div id="slave_img_input"></div>
                </td>
            </tr>



        </table>
    </form>
</div>


<script src="<?php echo STYLE_JS_PATH;?>/plupload/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //定义标志位
    var IS_UPLOAD_COMPLETE = [false,false];  //0 为主图标志位； 1为展示图标志位

    //主图的上传---start

    var uploader_master = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles_master', // you can pass an id...
        container: document.getElementById('container_master'), // ... or DOM Element itself
        url : '<?php echo ADMIN_URL;?>/pcase/upload',
        flash_swf_url : '<?php echo STYLE_JS_PATH;?>/plupload/Moxie.swf',
        silverlight_xap_url : '<?php echo STYLE_JS_PATH;?>/plupload/Moxie.xap',
        //multipart_params : ''
        multi_selection:false,

        filters : {
            max_file_size : '10mb',
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ]
        },

        init: {
            PostInit: function() {
                document.getElementById('filelist_master').innerHTML = '';

                document.getElementById('uploadfiles_master').onclick = function() {
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
                    var children = $("#filelist_master > div");
                    if(children.length <1){
                        document.getElementById('filelist_master').innerHTML += '<div id="' + file.id + '_master" style="float:left; margin-left:10px;position: relative;height:126px;margin-bottom: 10px;"></div>';

                        previewImage(file, function (imgsrc) {
                            //alert($("#"+file.id).html());
                            $("#"+file.id+"_master").attr("class","t-chuan t-zong");
                            var html = '<img  style="border: 3px solid #a4e9c1 " height=\'120px\'  src="' + imgsrc
                                + '" /><b></b><div class="del_img_js" data-val="'+file.id+'_master"  style="width:32px;height:32px;position: absolute;top:8px;right:8px;z-index:99;background-color:green;background: url(\'/assets/admin/images/del_32.png\') ;" ></div>';

                            $("#"+file.id+"_master").html(html);

                            //追加事件
                            $(".del_img_js").click(function(){

                                $(this).parent().remove();
                                uploader.removeFile($(this).attr("data-val"));
                                //        var toremove = '';
                                //        var id=$(this).attr("data-val");
                                //        for(var i in uploader.files){
                                //            if(uploader.files[i].id === id){
                                //                toremove = i;
                                //            }
                                //        }
                                //        uploader.files.splice(toremove, 1);
                                //        console.log("XXX"+$(this).attr("data-val"));
                            });


                        })
                    }

                });

                //限制文件上传的数量
                // al ert('只能上传1张图片，请注意选择图片！');

                if(up.files.length >1) {
                    alert('只能上传一张主图');
                    up.splice(1,999);
                }
            },

            UploadProgress: function(up, file) {
                //  document.getElementById('each_'+file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";


            },

            Error: function(up, err) {
                document.getElementById('console_master').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },
            FileUploaded: function(up,file,info){
                if (info.response != null) {
                    var jsonstr = eval("(" + info.response + ")");
                    var status = jsonstr.status;
                    if(status == 1){
                        var path = jsonstr.file_db_path;
                        $("#master_img_input").append('<input  type="hidden" name="master_img" value="'+path+'" />');
                    }
                }
            },

            UploadComplete: function(up,file){
                IS_UPLOAD_COMPLETE[0] = true;
            }
        }
    });

    uploader_master.init();

    //主图的上传---end


    //案例图的上传---start

    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles', // you can pass an id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url : '<?php echo ADMIN_URL;?>/pcase/upload',
        flash_swf_url : '<?php echo STYLE_JS_PATH;?>/plupload/Moxie.swf',
        silverlight_xap_url : '<?php echo STYLE_JS_PATH;?>/plupload/Moxie.xap',
        //multipart_params : ''

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
                        var html = '<div id="each_'+file.id+'" style="float:left; margin-left:10px;position: relative;height:126px;margin-bottom: 10px;" ><img  style="border: 3px solid #a4e9c1 " height=\'120px\'  src="' + imgsrc
                            + '" /><b></b><div class="del_img_js" data-val="'+file.id+'"  style="width:32px;height:32px;position: absolute;top:8px;right:8px;z-index:99;background-color:green;background: url(\'/assets/admin/images/del_32.png\') ;" ></div></div>';

                        $("#"+file.id).html(html);

                        //追加事件
                        $(".del_img_js").click(function(){

                            $(this).parent().remove();
                            uploader.removeFile($(this).attr("data-val"));
                            //        var toremove = '';
                            //        var id=$(this).attr("data-val");
                            //        for(var i in uploader.files){
                            //            if(uploader.files[i].id === id){
                            //                toremove = i;
                            //            }
                            //        }
                            //        uploader.files.splice(toremove, 1);
                            //        console.log("XXX"+$(this).attr("data-val"));
                        });


                    })
                });


            },

            UploadProgress: function(up, file) {
              //  document.getElementById('each_'+file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";


            },

            Error: function(up, err) {
                document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },
            FileUploaded: function(up,file,info){
                if (info.response != null) {
                    var jsonstr = eval("(" + info.response + ")");
                    var status = jsonstr.status;
                    if(status == 1){
                        var path = jsonstr.file_db_path;
                        $("#slave_img_input").append('<input  type="hidden" name="slave_img[]" value="'+path+'" />');
                    }
                }
            },

            UploadComplete: function(up,file){
                IS_UPLOAD_COMPLETE[1] = true;
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




    function onSubmitProject(){
		//验证参数的合法性
		var isValid = $("#projecr-form").form('validate');  //验证参数的合法性
        if (!isValid){
            $.messager.progress('close');
            return;
        }

		//验证图片必须上传一张
		var master_img = $("#filelist_master > div");
		var slave_img = $("#filelist > div");
		if(master_img.length <=0){
			//alert("请上传主图");
            $.messager.alert('提示','请上传主图！','warning');
			isValid = false;
            return ;
		}
		if(slave_img.length <=0){
			//alert("请至少上传一张展示图！");
            $.messager.alert('提示','请至少上传一张展示图！','warning');
			isValid = false;
            return ;
		}
		
		if (!isValid){
			$.messager.progress('close');
			return;
		}
		
		
        //提交图片
        uploader.start();
        uploader_master.start();
//        alert($res);
        //提交表单
        commitForm();
    }

    //条件满足时，执行提交
    function commitForm()
    {
        if(IS_UPLOAD_COMPLETE[0] && IS_UPLOAD_COMPLETE[1]){
                $("#projecr-form").form('submit',{
                    url:'<?php echo ADMIN_URL;?>/pcase/doAdd',
                    onSubmit: function(){
                        var isValid = $(this).form('validate');  //验证参数的合法性
                        if (!isValid){
                            $.messager.progress('close');
                        }
                        return isValid;
                    },
                    success:function(data){
                        var jsonstr = eval("(" + data + ")");
                        $.messager.progress('close');
                        if(jsonstr.status == 1){
                            $.messager.alert('提示','新增数据成功！','info',function(){
                                //关闭添加框
                                $('#dlg').dialog('close');
                                $('#dg').datagrid('reload');
                            });
                        }else{
                            $.messager.alert('提示','新增数据失败！','warning');
                        }
                    }
                });

        }else{
            setTimeout("commitForm()", 100);
        }
    }

    //关闭按钮
    function onResetProject(){
        $('#dlg').dialog('close');
    }


</script>

