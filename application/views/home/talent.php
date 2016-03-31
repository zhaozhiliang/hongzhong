<?php $this->load->view('/home/header.php');?>

        <link href="<?php echo HOME_CSS_PATH;?>/talent.css" rel="stylesheet">
        <!--人才优势-->
        <div class="bg-colo main ">
            <div class="top_bt ar-a">职业规划</div>
            <div class="center">
                <div class="cen-left">
                    <p class="siz-js">完善而精准</p>
                    <p class="siz-mac">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金凯是全球增长最快的IT+的提供商之一。我们深知人才是公司最宝贵的财富，因此，成为全球最佳雇主一直是我们的努力的方向。</p>
                    <p class="siz-mac zi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司设立了严谨，公平的T级制度，为员工设计职业发展通道，将全部岗位纳入T级评定，按不同职务分设不同T级线路，为员工的职业发展明确目标。</p>
                </div>
                <div class="cen-right">
                    <img src="<?php echo HOME_IMG_PATH;?>/tuxiang.png">
                </div>
            </div>
            <div class="cr"></div>
            <div></div>
        </div>
        <div class="bg-co main">
            <div class="top_bt bt-blck">薪酬规划</div>
            <div class="center">
                <div class="amc_ct">
                    <p class="siz-mac c-ct art-cr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金凯致力于为员工提供完善的福利保障，实现员工工作与生活的平衡，提倡"高效工作，快乐生活"。 我们建立了满足公司战略发展的科学薪酬体系，绩效激励体系，以员工为出发点，绩效为依据，提供公平的，有竞争力的薪酬回报。</p>
                    <p class="siz-mac zi c-ct">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司推出长期激励计划，与员工分享公司业绩成果，实现公司与员工双赢。公司关注每一位员工，从工作、生活、健康等多方面为员工提供具有竞争力的福利。 具体是由T级工资+项目奖金+绩效考核+福利+代扣代缴+司龄工资+其它奖金构成。一分耕耘一分收获!</p>
                </div>
                <div class="cen-ri">
                    <img src="<?php echo HOME_IMG_PATH;?>/changjingtu.jpg">
                </div>
            </div>
        </div>
        <div class="bg-arct main">
            <div class="top_bt bt-blck ">人才培养</div>
            <div class="center">
                <p class="cen-kouk">半年成长周期：金凯半年=其他公司两年的成长</p>
                <div class="servic">
                    <ul class="dis-poct">
                        <li>
                            <div class="serv">
                                <img src="<?php echo HOME_IMG_PATH;?>/mr1.png">
                                <h2>人才创新</h2>
                            </div>
                            <div class="rctw">
                                <p>以老带新，加速新人成长</p>
                                <p>辅助员工提高学历教育</p>
                            </div>
                        </li>
                        <li>
                            <div class="serv">
                                <img src="<?php echo HOME_IMG_PATH;?>/pr2.png">
                                <h2>T级考核</h2>
                            </div>
                            <div class="rctw">
                                <p>针对各部门制定了严格的</p>
                                <p>考核考评</p>
                            </div>
                        </li>
                        <li>
                            <div class="serv">
                                <img src="<?php echo HOME_IMG_PATH;?>/pr3.png">
                                <h2>技能培训</h2>
                            </div>
                            <div class="rctw">
                                <p>定期的新技术培训以及素质</p>
                                <p>拓展训练</p>
                            </div>
                        </li>
                        <li>
                            <div class="serv">
                                <img src="<?php echo HOME_IMG_PATH;?>/pr4.png">
                                <h2>优质客户</h2>
                            </div>
                            <div class="rctw">
                                <p>拥有各行业海量的优质项目</p>
                                <p>以及强有力的客户资源</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="renster"></div>
        <div class="bg-cell main">
            <div class="top_bt ">团队精神</div>
            <p class="cen-ko">我们是一个强大的团队，我们能学到很多专业更高深的技术，我们是一个凝聚的团队，我们的家在金凯，我们的家人就在身边，带给我们意想不到的收获!</p>
            <div class="sic">
                <ul class="gui-ql">
                    <li class="hat">
                        <img src="<?php echo HOME_IMG_PATH;?>/dsc_1814.jpg">
                        <p class="siz-mar">金凯体育运动会</p>
                        <p class="sar">2014-01-20</p>
                        <p class="supost-js"></p>
                    </li>
                    <li>
                        <img src="<?php echo HOME_IMG_PATH;?>/dsc_2658.jpg">
                        <p class="siz-mar">金凯春季滑雪</p>
                        <p class="sar">2015-01-20</p>
                        <p class="supost-js"></p>
                    </li>
                    <li>
                        <img src="<?php echo HOME_IMG_PATH;?>/jksxz.jpg">
                        <p class="siz-mar">金凯家庭聚会</p>
                        <p class="sar">2015-05-26</p>
                        <p class="supost-js"></p>
                    </li>
                    <li>
                        <img src="<?php echo HOME_IMG_PATH;?>/dsc_5040.jpg">
                        <p class="siz-mar">金凯盛夏之旅</p>
                        <p class="sar">2015-08-21</p>
                        <p class="supost-js"></p>
                    </li>
                </ul>
            </div>
        </div>
        <script>
            $(".gui-ql li").hover(function() {
                $(this).find(".supost-js").css('border-bottom', '3px solid  #4474CC');
            }, function() {
                $(this).find(".supost-js").css('border-bottom', '3px solid #807e7e');
            })
        </script>
        <!--end-->
<?php $this->load->view('/home/foot.php');?>