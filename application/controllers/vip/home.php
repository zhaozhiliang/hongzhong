<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
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
		$this->business();
	}

	/**
	 * 业务范围
	 */
	public function business(){
		$data = array();
		$data['head_title'] = '业务范围';
		$data['head_nav'] = 'business';

		$this->load->view('/home/business',$data);
	}

	/**
	 * 案例
	 */
	public function pcase(){
		$data = array();
		$data['head_title'] = '案例';
		$data['head_nav'] = 'business';


		$this->load->view('/home/pcase',$data);
	}

	/**
	 * 公司优势
	 */
	public function power(){
		$data = array();
		$data['head_title'] = '业务范围';
		$data['head_nav'] = 'power';

		$this->load->view('/home/power',$data);
	}

	/**
	 * 人才优势
	 */
	public function talent(){
		$data = array();
		$data['head_title'] = '业务范围';
		$data['head_nav'] = 'talent';

		$this->load->view('/home/talent',$data);
	}

	/**
	 *  关于
	 */
	public function about(){
		$data = array();
		$data['head_title'] = '业务范围';
		$data['head_nav'] = 'about';

		$this->load->view('/home/about',$data);
	}

}