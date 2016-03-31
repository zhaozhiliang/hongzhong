<?php $this->load->view('/home/header.php');?>
		<!--header end-->
		<link href="<?php echo HOME_CSS_PATH;?>/index.css" rel="stylesheet">
		<link href="<?php echo HOME_CSS_PATH;?>/about.css" rel="stylesheet">
		<div class="about-us main">
			<div class="about-clt">
				<p>CONTACT US</p>
				<p>联系我们</p>
			</div>
			<p class="abo-ml">中国领先的【IT+】服务的提供商，全球客户值得依赖的合作伙伴。</p>
			<p class="abo-aml">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提供解决方案、互联网研发、IT人才、产品运营的“一站式”服务。公司拥有一支富有经验并充满激情的专业团队，其中研发人员比例接近80%。自成立以来，通过专业的技术和非凡创造力，坚持不懈的致力于为客户提供便捷、先进、人性化的技术服务，帮助客户更好地应用并享受互联网科技带来的愉悦成就。</p>
			<p class="abo-lct">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司总部坐落于北京市金蝶软件园，辐射望京和上地，我们秉承客户至上、技术领先、激情专业、同心同德的价值观，完成与客户共创共赢的使命，在发展的道路上插上互联网的翅膀，成为【IT+】服务的领航者。</p>
		</div>
		<div class="abou-bg main">
			<div class="about-clt ac-col">
				<p>CORPORATE CULTURE</p>
				<p>企业文化</p>
			</div>
			<div class="abou-tent">
				<ul>
					<li>
						<div class="uilt">
							<img src="<?php echo HOME_IMG_PATH;?>/zhengfan1.png">
						</div>
						<div class="ui-size">
							<p class="si-ar">价值</p>
							<hr>
							<p class="yu-ct">客户价值+公司价值+个人价值,</p>
							<p class="yu-ct">三位一体实现价值的成就感。</p>
						</div>
					</li>
					<li>
						<div class="uilt">
							<img src="<?php echo HOME_IMG_PATH;?>/zhengfan2.png">
						</div>
						<div class="ui-size">
							<p class="si-ar">依赖</p>
							<hr>
							<p class="yu-ct">员工可以依赖公司，公司可以依</p>
							<p class="yu-ct">赖员工，员工之间可以相互依赖，</p>
							<p class="yu-ct">家一样的温馨可靠</p>
						</div>
					</li>
					<li>
						<div class="uilt">
							<img src="<?php echo HOME_IMG_PATH;?>/zhengfan3.png">
						</div>
						<div class="ui-size">
							<p class="si-ar">梦想</p>
							<hr>
							<p class="yu-ct">执着梦想的队伍</p>
							<p class="yu-ct">引领世界的抱负</p>
							<p class="yu-ct">成就辉煌的期待</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="ac-act"></div>
			<p class="p-tc">我们一直在追逐一个梦想，渴求将我们的专业能力，渗透至品牌、平台、以及客服关键环节，期望有一天，能为金凯成千上万的用户打造出至高无上的互联网产品。如你所见，我们愿与你携手，一起追逐这个梦想。金凯在全国乃至全球范围内广纳贤才。加入我们的行列，您不仅能与IT精英亲密合作，更有机会在充满激情的舞台上，挑战自我。</p>
			<div class="img-tc">
				<a href="http://sou.zhaopin.com/jobs/companysearch.ashx?CompID=CC518681829">
					<img src="<?php echo HOME_IMG_PATH;?>/zhaopin.jpg">
				</a>
			</div>
		</div>
		<div class="contact main">
			<div class="cot">
				<img src="<?php echo HOME_IMG_PATH;?>/title_4.png" class="title">
				<img src="<?php echo HOME_IMG_PATH;?>/map_ico.png" class="contact_map_ico">
				<img src="<?php echo HOME_IMG_PATH;?>/logo2.png" class="contact_logo">
				<p>联系我们：北京金凯瑞铭信息技术有限公司</p>
				<p>商务中心：北京市望京悠乐汇C座7层</p>
				<p>地址：北京市顺义区金蝶软件园A座2层</p>
				<p>联系电话：010-59946168&nbsp;&nbsp;&nbsp;&nbsp;邮箱：hr@jksoft.cn</p>
				<p>网址：www.jksoft.cn</p>
				<div class="contact_formdiv clearfix">
					<textarea id="cMessage" style="color:#282626">请在此输入您的留言内容，我们收到留言后会尽快联系您。</textarea>
					<div class="contact_formdiv_input">
						<input type="text" value="联系人" id="cPerson">
						<input type="text" value="联系电话" class="contact_formdiv_input_2" id="cTel">
					</div>
					<button id="publish">提 交</button>
				</div>
			</div>
		</div>
		<!--联系我们 end-->
		<script type="text/javascript">
			$(function() {
				$("#cMessage").focus(function() {
					if ($(this).val() == '请在此输入您的留言内容,我们收到留言后会尽快联系您。') {
						$(this).val('');
					}
				});
				$("#cMessage").blur(function() {
					if ($(this).val() == '') {
						$(this).val('请在此输入您的留言内容，我们收到留言后会尽快联系您。');
					}
				});
				$("#publish").click(function() {
					var user = $.trim($("#cPerson").val());
					var tel = $.trim($("#cTel").val());
					var mes = $.trim($("#cMessage").val());
					var reg = /^[1][34578][0-9]{9}$/;
					if (user == '联系人' || user == '' || user.length > 30) {
						alert('联系人名称请控制在1-30个字符内');
					} else if (!reg.test(tel)) {
						alert('请填写正确手机号格式');
					} else if (mes == '请在此输入您的留言内容，我们收到留言后会尽快联系您' || mes == '' || mes.length > 300) {
						alert('留言内容请控制在1-300个字符');
					} else {
						$.post('/index.php?a=message', {
							user: user,
							mes: mes,
							tel: tel
						}, function(res) {
							if (res.type == 1) {
								$("#cPerson").val('联系人');
								document.getElementById("cMessage").value = "请在此输入您的留言内容，我们收到留言后会尽快联系您";
								$("#cTel").val('联系电话');
							}
							alert(res.info);
						});
					}
				});
			});
		</script>
		<!--footer-->
<?php $this->load->view('/home/foot.php');?>