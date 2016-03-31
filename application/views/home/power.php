<?php $this->load->view('/home/header.php');?>
	<!--header end-->
	﻿    <link href="<?php echo HOME_CSS_PATH;?>/power.css" rel="stylesheet">
 <!--战略规划-->
    <div class="current  main">
        <div class="tilie">
            <img src="<?php echo HOME_IMG_PATH;?>/s.png">
        </div>
        <div style="position: relative;">
            <div class="sidebar_pt">

                <div class="pt_list"> 
                    <div class="sideber_p " onmousemove="mve()">
                        <img src="<?php echo HOME_IMG_PATH;?>/yuan_03.png">
                    </div>
                    <div class="marct">
                        <img src="<?php echo HOME_IMG_PATH;?>/kuang_02.png">
                    </div>
                </div>
                <div class="pt_st">
                <div class="sideber_t" onmousemove="mes()">
                    <img src="<?php echo HOME_IMG_PATH;?>/yuan_05.png">
                </div>
                <div class="modul_ml">
                    <img src="<?php echo HOME_IMG_PATH;?>/kuang_04.png">
                </div>
             </div>


                <div class=" sum">
                    <img src="<?php echo HOME_IMG_PATH;?>/img_07.jpg">
                </div>
                <div class="sum_mc">
                    <div class="summer_tl">
                    <div class=" sum_m" onmouseover="tarct()">
                        <img src="<?php echo HOME_IMG_PATH;?>/yuan_04.png">
                    </div>
                    <div class="scrt_li">
                        <img src="<?php echo HOME_IMG_PATH;?>/kuang_03.png">
                    </div>
                    </div>
                        <div class="sum_ct" onmousemove="ove()">
                        <img src="<?php echo HOME_IMG_PATH;?>/yuan_06.png">
                    </div>
                    <div class="s_cor">
                        <img src="<?php echo HOME_IMG_PATH;?>/kuang_05.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!--  <script>

       $(document).ready(function () {
           $('.sum_m').mouseenter(function () {
               $(".scrt_li").fadeIn(800);
           });
           $('.sum_ct').mouseenter(function () {
               $(".s_cor").fadeIn(800);
           });
           $('.sideber_p').mouseenter(function () {
               $(".marct").fadeIn(800);
           });
           $('.sideber_t').mouseenter(function () {
               $(".modul_ml").fadeIn(800);
           });
       });
    </script>-->
    <!--end-->
    <!--核心竞争力-->
    <div class="shop ">
        <div class="tit main">
            <img src="<?php echo HOME_IMG_PATH;?>/c.png">
        </div>
        <div class="my-action">
          <img src="<?php echo HOME_IMG_PATH;?>/quan1.png">
        </div>
        <div class="my-ion">
          <img src="<?php echo HOME_IMG_PATH;?>/quan2.png">
        </div>
        <div class="containe main">
            <div class="con_left">
                <h1>[IT+]服务的领航者，目标是行业领军</h1>
                <p class="cle_le"><span class="cl_l1">
                     <img src="<?php echo HOME_IMG_PATH;?>/img_08.png" class="cl_colik"></span><span class="cl_l2">优秀的工程师、设计师、业界顶尖的研发团队</span></p>
                <p><span class="cl_l1">
                     <img src="<?php echo HOME_IMG_PATH;?>/img_09.png" class="cl_colik"></span><span class="cl_l2">全精品项目</span></p>
                <p><span class="cl_l1">
                    <img src="<?php echo HOME_IMG_PATH;?>/img_10.png" class="cl_colik"></span><span class="cl_l2">全高端客户</span></p>
            </div>
        </div>
        <div class="mc-crt">
               <img src="<?php echo HOME_IMG_PATH;?>/quan3.png">
        </div>
    </div>
    <!--end-->
    <!--联系我们-->
    <div class="contact main">
        <div class="cot">
            <img src="<?php echo HOME_IMG_PATH;?>/logo2.png" class="contact_logo">
            <p>研发中心：北京市顺义区金蝶软件园A座2层</p>
            <p>商务中心：北京市望京悠乐汇C座7层</p>
            <p>联系电话：010-59946168</p>
            <p>邮箱：hr@jksoft.cn</p>
            <p>网址：www.jksoft.cn</p>
        </div>
    </div>
    <!--联系我们 end-->
    <?php $this->load->view('/home/foot.php');?>
