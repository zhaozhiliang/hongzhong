<?php
class PcaseModel extends CI_Model{
	//private $db=NULL;
	private $t_pacse = "pcase";

	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);  //第二个参数很重要，为true表示会返回实例。

		//var_dump($this->db);die;
	}


	/**
	 * 添加一条
	 */
	public function addOne($data = array()){

		$this->db->insert($this->t_pacse,$data);
		$rule_id = $this->db->insert_id();

		if ($rule_id)
		{
			return true;
		}else{
			return false;
		}

	}


	/**
	 * 资源位列表
	 */
	public function getPcaseList($where = array(),$limit=0,$offset=0){
		if (!empty($where)){
			$whereStr = ' where 1 ';

			if (isset($where['id']) && !empty($where['id'])) {
				$whereStr .= " and id = '" . $where['id'] . "'";
			}
			if (isset($where['title']) && !empty($where['title'])) {
				$whereStr .= " and title like '%" . $where['title'] . "%' ";
			}
			if (isset($where['status']) && !empty($where['status'])) {
				$whereStr .= " and status=" . $where['status'];
			}
		}else {
			$whereStr = '';
		}

		$result = array();
		$sql = "SELECT * FROM {$this->t_pacse} {$whereStr}  LIMIT {$offset}, {$limit}";
		$query = $this->db->query($sql);
		$result['list'] = $query->result_array();
		$cntSql = "SELECT COUNT(*) AS cnt FROM {$this->t_pacse} {$whereStr}";
		$cntQuery = $this->db->query($cntSql);
		$cntRow = $cntQuery->row_array();
		$result['total'] = $cntRow['cnt'];
		return $result;
	}



	/**
	 * @param $id
	 */
	public function getPcaseById($id){
		if($id <1){
			return false;
		}

		$sql = "SELECT * FROM {$this->t_pacse} WHERE id={$id}  LIMIT 1";
		$query = $this->db->query($sql);
		return $row = $query->row_array();
	}

	/**
	 * 更新
	 */
	public function updateById($id,$data){
		if($id<1){
			return false;
		}
		$res_rule = $this->db->update($this->t_pacse, $data, array('id'=>$id));
		//echo 'model:';var_dump($res_rule);die;
		return $res_rule;
	}

	/**
	 * 删除某条资源
	 */
	public function delPcaseById($id){
		$data = array();
		$data['status'] = 2;
		$data['uptime'] = date('Y-m-d H:i:s',time());
		return $this->updateById($id,$data);
	}

	/**
	 * @param $id
	 * 启用某条资源
	 */
	public function reusePcaseById($id){
		$data = array();
		$data['status'] = 1;
		$data['uptime'] = date('Y-m-d H:i:s',time());
		return $this->updateById($id,$data);
	}
}