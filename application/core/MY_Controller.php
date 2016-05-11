<?php  if ( ! defined('BASEPATH')) exit('No direct kongript access allowed');
/**
 * Class Logined_Controller
 * 需要登录的接口都需要继承这个类
 */
class Needlogin_Controller extends CI_Controller{

	/**
	 * Logined_Controller constructor.
	 * 构造函数
	 */
	public function __construct()
	{
		parent::__construct();

		//验证是否登录
		$this->load->library('login');	// 加载参数验证类库
		$this->load->helper('url');	// 加载公共辅助函数

		// 验证请求的签名
		$res = $this->login->is_logged_in();
		if(!$res){ // 没登录
			redirect(ADMIN_URL.'/login/login');
		}
	}
}


