<?php $this->load->view('/home/header.php');?>


    <link href="<?php echo HOME_CSS_PATH;?>/case.css" rel="stylesheet">
    <!--上部图片banner-->
    <div class="banner banner-top main">
        <img src="<?php echo HOME_IMG_PATH;?>/bg_14.jpg">
    </div>
    <!--上部图片banner end-->
    <!--切换tab-->
    <div class="tab main">
        <ul>
            <li class="active tab1" node-type="tab-case" ref-data="anli1">互联网+</li>
            <li class="tab2" node-type="tab-case" ref-data="anli2">信息化</li>
        </ul>
    </div>
    <!--切换tab end-->
    <!--项目案例-->
    <!--互联网产品-->
    <div data-type="data-case" class="anli1">
        <div class="project main" data-type="data-project">
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/sheq.jpg"> <span>社区e服务</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/shequefuwu.png">
                </div>
            </a>
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/pro_2.jpg"> <span>择居网</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/zhejuwang.png">
                </div>
            </a>
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/pro_3.jpg"> <span>易驾</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/yijia.png">
                </div>
            </a>
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/pro_4.jpg"> <span>乡村游</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/xiangcunyou.png">
                </div>
            </a>
        </div>
    </div>
    <!--互联网产品 end-->
    <!--信息化-->
    <div data-type="data-case" class="anli2">
        <div class="project main" data-type="data-project">
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/qinghuatongfang.jpg"> <span>清华同方项目管理平台</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/qinghuatongfang01.png">
                </div>
            </a>
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/xinxingjihua.jpg"> <span>新兴际华</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/xinxingjihua01.png">
                </div>
            </a>
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/weixinshenhepingtai.jpg"> <span>微信审核平台</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/weixinshenhepingtai01.png">
                </div>
            </a>
            <a class="project_box">
                <div class="project_box_main">
                    <img class="project_box_main_img" src="<?php echo HOME_IMG_PATH;?>/weixinshenhepingtai.jpg"> <span>微信审核平台</span>
                    <img class="project_box_main_font" src="<?php echo HOME_IMG_PATH;?>/weixinshenhepingtai01.png">
                </div>
            </a>
        </div>
    </div>
    <!--电子商务 end-->
    <!--项目案例 end-->
    <!--下部图片banner-->
    <div class="banner banner-footer main">
        <img src="<?php echo HOME_IMG_PATH;?>/bg_14.jpg">
    </div>
    <!--下部图片banner end-->
    <script src="<?php echo HOME_JS_PATH;?>/idangerous.swiper.js"></script>
    <script src="<?php echo HOME_JS_PATH;?>/case.js"></script>
    <!--footer-->
<?php $this->load->view('/home/foot.php');?>