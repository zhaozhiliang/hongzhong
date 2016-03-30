<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pcase extends CI_Controller {
	private $_numOfPage = 5;
	
	private $_defaultUrl = array();
	
	public function __construct(){
		parent::__construct();
		//$this->load->Model('UserModel');
		$this->load->Model('/admin/PcaseModel');
	}

	/**
	 *
	 */
	public function add(){
		$data = array();
		$this->load->view('/pcase/add',$data);
	}

	public function caseList(){
		$data = array();
		$this->load->view('/pcase/list',$data);
	}

	public function ajaxGetList(){
		$data = array();
		$page = (int)$this->input->get('page',TRUE);
		$rows = (int)$this->input->get('rows',TRUE);
		$limit = !empty($rows)? $rows : $this->_numOfPage;
		$page = !empty($page) ? $page : 1;
		$offset = ($page-1)*$limit;



		$where = array();
		$res = $this->PcaseModel->getPcaseList($where,$limit,$offset);
		if(!empty($res['list']) && is_array($res['list'])){
			$list = array();
			foreach($res['list'] as $key=>&$val){
				$tmp = array();
				$tmp['id'] = $val['id'];
				$tmp['title'] = $val['title'];
				$tmp['content'] = $val['content'];
				$tmp['ctime'] = $val['ctime'];
				$tmp['master_img'] = '<img src="'.IMAGE_URL.'/'.$val['master_img'].'" width="100" />';
				$tmp['status'] = $val['status'];
				if($val['status'] == 0){
					$tmp['status_cn'] = '展示';
				}else{
					$tmp['status_cn'] = '不展示';
				}
				$list[] = $tmp;
			}
			$data['rows'] = $list;
		}else{
			$data['rows'] = array();
		}
		$data['total'] = !empty($res['total']) ? $res['total'] : 0;
		echo json_encode($data);
	}
}