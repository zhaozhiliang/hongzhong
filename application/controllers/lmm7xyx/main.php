<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
	
	private $_defaultUrl = array();
	
	public function __construct(){
		parent::__construct();
		//$this->load->Model('UserModel');
		$this->_setDefaultUrl();
	}
	
	/**
	* 设置URL
	*/
	private function _setDefaultUrl()
	{
		$this->_defaultUrl = array(
			'12' => "/admin/user/user_admin",
			'35' => "/order/order/index",
			'45' => "/partner/partner/partnerList",
			'65' => "/repository/repository/category",
			'69' => "/goods/goods/cateList",
			'89' => "/financial/returns/index",
			'90' => "/statistics/statistics/index",
			'91' => "/erp/returns/index"
		);
	}
	
	/**
	* 获取默认的路由
	*/
	private function _getDefaultUrl($topId)
	{
		return $this->_defaultUrl[$topId];
	}
	
	public function index(){
 		$topId = (int)$this->input->get('topid',true);
        $topId = $topId>0?$topId:'12';

		$topMenu = array();
		$leftMenu = array();
        $data = array(
            'defaultUrl' => $this->_getDefaultUrl($topId),
            'topId' => $topId,
            'topMenu' => $topMenu,
            'leftMenu' => $leftMenu
        );
		$this->load->view('/main/index',$data);
	}
}