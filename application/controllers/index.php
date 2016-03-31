<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller {
	private $_numOfPage = 5;
	
	private $_defaultUrl = array();
	
	public function __construct(){
		parent::__construct();
		//$this->load->Model('UserModel');
		$this->load->Model('/admin/PcaseModel');
	}

	/**
	 * 网站首页
	 */
	public function index(){
		$data = array();
		$data['head_title'] = '鸿众-专业的移动互联网研发_APP_微信_电商_微商_整体解决方案';
		$data['head_nav'] = 'index';

		$this->load->view('/home/index',$data);
	}

}