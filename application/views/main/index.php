<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>三好网管理后台</title>
    <link href="<?php echo STYLE_CSS_PATH ;?>/base.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo STYLE_JS_PATH ;?>/easyui/1.3.2/themes/bootstrap/easyui.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo STYLE_JS_PATH ;?>/easyui/1.3.2/themes/icon.css" rel="stylesheet" type="text/css" />
</head>
<body class="easyui-layout" style="text-align: left">
<div region="north" border="false" style="background: #666; text-align: center">
    <div id="header-inner">
        <table cellpadding="0" cellspacing="0" style="width: 100%;">
            <tr>
                <td rowspan="2" style="width: 20px;">
                </td>
                <td style="height: 52px;">
                    <div style="color: #fff; font-size: 22px; font-weight: bold;">
                        <a href="#" style="color: #fff; font-size: 22px; font-weight: bold; text-decoration: none">
                            管理后台</a>
                    </div>
                    <div style="color: #fff">
                        <a href="#" style="color: #fff; text-decoration: none">业务系统 权限系统</a>
                    </div>
                </td>
                <td style="padding-right: 5px; text-align: right; vertical-align: bottom;">
                    <div id="topmenu"></div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div region="west" border="true" split="true" title="我的工作台" style="width: 250px;">



    <div class="easyui-accordion">
        <div title="工作管理" iconCls="icon-project" selected="true" style="overflow:auto;">
            <ul class="easyui-tree">
                <li iconcls="icon-base"><span>案例管理</span>
                    <ul>
                        <li iconcls="icon-gears"><a href="#" onclick="open1('案例列表','<?php echo ADMIN_URL;?>/pcase/caseList')">案例列表</a></li>
                    </ul>
                </li>
                <li iconcls="icon-base"><span>留言管理</span>
                    <ul>
                        <li iconcls="icon-gears"><a href="#" onclick="open1('留言列表','@Url.Action("AppConfig","CustomNav")')">留言列表</a></li>
                        <li iconcls="icon-gears"><a href="#" onclick="open1('未处理留言','@Url.Action("NavConfig","CustomNav")')">未处理留言</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div title="系统管理" iconCls="icon-setting">
            <ul id="tt1" class="easyui-tree">
                <li>
                    <span>权限管理</span>
                    <ul>
                        <li><a href="#" onclick="open1('管理员列表','<?php echo ADMIN_URL;?>/pcase/caseList')">管理员列表</a></li>
                        <li><span>角色列表</span></li>
                        <li><span>权限列表</span></li>
                    </ul>
                </li>
                <li><span>File2</span></li>
            </ul>
        </div>
    </div>
        

</div>
<div region="center" border="true">
    <div id="tt" class="easyui-tabs" fit="true" border="false" plain="true">
        <div title="管理中心" iconcls="icon-home" bodyCls="p5">
            <!--<iframe frameborder="0" src="welcome.html" ></iframe>-->
            <iframe frameborder="0" src="order_mgr.html" ></iframe>
        </div>
    </div>
</div>
<div region="south" border="false" style="background-color: #eeeeee; height: 22px; line-height: 22px; padding-right: 10px; font-size: 12px; color:#999999; text-align:right;"><span>Design By：EveryDing</span></div>
<script src="<?php echo STYLE_JS_PATH;?>/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo STYLE_JS_PATH;?>/easyui/1.4.2/jquery.easyui.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#tt').tabs({
            onLoad: function (panel) {
                var plugin = panel.panel('options').title;
            }
        });
    });

    function open1(title, plugin) {
        if ($('#tt').tabs('exists', title)) {
            $('#tt').tabs('select', title);
        } else {
            $('#tt').tabs('add', {
                title: title,
                closable: true,
                bodyCls: 'p5',
                content: '<iframe frameborder="0" src="' + plugin + '"></iframe>'
            });
        }
    }
</script>
</body>
</html>
