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

	public function doAdd(){
//		array(6) {
//			["title"]=>
//  string(6) "测试"
//  ["type"]=>
//  string(1) "0"
//  ["content"]=>
//  string(6) "测试"
//  ["detail"]=>
//  string(24) "{$info.baseinfo.content}"
//  ["master"]=>
//  string(30) "/uploads/case/2016/04/29/5.jpg"
//  ["slave_img"]=>
//  array(2) {
//				[0]=>
//    string(30) "/uploads/case/2016/04/29/5.jpg"
//    [1]=>
//    string(30) "/uploads/case/2016/04/29/5.jpg"
//  }
//}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', '标题', 'required');
		$this->form_validation->set_rules('profile', '简介', 'required');
		$this->form_validation->set_rules('content', '详情', 'required');
		$this->form_validation->set_rules('master_img', '主图', 'required');


		if ($this->form_validation->run())
		{
			$info = array();
			$info['title'] = $this->input->post('title',TRUE);
			$info['profile'] = $this->input->post('profile',TRUE);
			$info['content'] = $this->input->post('content',TRUE);
			$info['master_img'] = $this->input->post('master_img',TRUE);
			$info['slave_img'] = $this->input->post('slave_img',TRUE);
			//$info['code'] = $this->input->post('code',TRUE);
			$info['ctime'] = date('Y-m-d H:i:s',time());

			if(empty($info['slave_img'])){
				echo json_encode(array('status'=>-1,'msg'=>'参数错误'));die;
			}

			$res = $this->PcaseModel->addOne($info);

			//$res = true;

			if($res){
				echo json_encode(array('status'=>1,'msg'=>'成功'));die;
			}else{
				echo json_encode(array('status'=>-2,'msg'=>'失败'));die;
			}
		}
		else
		{
			echo json_encode(array('status'=>-1,'msg'=>'参数错误'));die;
		}


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

	/**
	 * 上传
	 */
	public function upload(){
		if(isset($_FILES['file']) && !empty($_FILES['file']['tmp_name']))
		{
			$config = array();
			$ext = strtolower(pathinfo ( $_FILES['file']['name'] , PATHINFO_EXTENSION));
			$config['file_name'] = time() . rand(100000, 999999).'.'.$ext;
			$dir = 'pcase_img/'.date('Y').'/'.date('m').'/'.date('d').'/';
			$config['upload_path'] = UPLOAD_PATH.$dir;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10*1024;
			$config['max_width']  = '2048';
			$config['max_height']  = '2048';
			if(!file_exists($config['upload_path'])) mkdir($config['upload_path'], 0777, true); //必须要
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file'))
			{
				$pcData = $this->upload->data();
				$pc_pic = $dir . $pcData['file_name'];
				echo json_encode(array('status'=>1,'msg'=>'成功','file_db_path'=>$pc_pic));die;
			}else{
				echo json_encode(array('status'=>-1,'msg'=>'失败'));die;
			}
		}else{
			echo json_encode(array('status'=>-2,'msg'=>'参数错误'));die;
		}

	}


}