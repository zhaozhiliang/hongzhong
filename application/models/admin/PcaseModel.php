<?php
class PcaseModel extends CI_Model{
	//private $db=NULL;
	private $t_pacse = "pcase";
	private $t_pacse_img = "pcase_img";

	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);  //第二个参数很重要，为true表示会返回实例。

		//var_dump($this->db);die;
	}


	/**
	 * 添加一条
	 */
	public function addOne($data = array()){
        if(isset($data['slave_img'])){
			$slave_img = $data['slave_img'];

			unset($data['slave_img']);
		}
		$this->db->insert($this->t_pacse,$data);
		$rule_id = $this->db->insert_id();

		$img_arr = array();
		if(!empty($slave_img) && is_array($slave_img)){
			foreach($slave_img as $key=>$val){
				$tmp = array();
				$tmp['url'] = $val;
				$tmp['pcase_id'] = $rule_id;
				$img_arr[] = $tmp;
			}
		}
		if(!empty($img_arr)){
			$this->db->insert_batch($this->t_pacse_img,$img_arr);
		}

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
		$whereStr = ' where status=0 ';
		if (!empty($where)){

			if (isset($where['id']) && !empty($where['id'])) {
				$whereStr .= " and id = '" . $where['id'] . "'";
			}
			if (isset($where['title']) && !empty($where['title'])) {
				$whereStr .= " and title like '%" . $where['title'] . "%' ";
			}
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
	 * 获取某个案例下的正常的图片
	 */
	public function getPcaseImgByPcaseId($pid){
		if($pid <1){
			return false;
		}

		$sql = "SELECT * FROM {$this->t_pacse_img} WHERE pcase_id={$pid} AND status=0";
		$query = $this->db->query($sql);
		return $row = $query->result_array();
	}

	/**
	 * 更新
	 */
	public function updateById($id,$data){
		if($id<1){
			return false;
		}
		if(isset($data['del_img'])){
			$del_img = $data['del_img'];
		}
		unset($data['del_img']);
		if(isset($data['slave_img'])){
			$slave_img = $data['slave_img'];
		}
		unset($data['slave_img']);
		$res_rule = $this->db->update($this->t_pacse, $data, array('id'=>$id));

		$img_arr = array();
		if(!empty($slave_img) && is_array($slave_img)){
			foreach($slave_img as $key=>$val){
				$tmp = array();
				$tmp['url'] = $val;
				$tmp['pcase_id'] = $id;
				$img_arr[] = $tmp;
			}
		}
		if(!empty($img_arr)){
			$this->db->insert_batch($this->t_pacse_img,$img_arr);
		}
		if(!empty($del_img)){
			$id_str = '('.implode(',',$del_img).')';
			$sql = "UPDATE {$this->t_pacse_img} SET status=1 WHERE id in $id_str";
			$res_del = $this->db->query($sql);

		}

		return $res_rule;
	}

	/**
	 * 删除某条资源
	 */
	public function delPcaseById($id){
		$data = array();
		$data['status'] = 1;
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