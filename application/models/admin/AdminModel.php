<?php
/**
 * Created by PhpStorm.
 * User: jiapin
 * Date: 2016/4/26
 * Time: 16:23
 */
class AdminModel extends CI_Model{
    private $t_admin = 'admin';

    public function __construct()
    {
        $this->db = $this->load->database('default',TRUE);
    }

    public function getInfoByPhone($phone){
        $sql = "SELECT * FROM {$this->t_admin} WHERE phone = ? limit 1";
        $query = $this->db->query($sql, array($phone));
        return $query->row_array();
    }

    public function getAdminList($where = array(),$limit=0,$offset=0){

        if (!empty($where)){
            $whereStr = ' where 1=1 ';

            if (isset($where['id']) && !empty($where['id'])) {
                $whereStr .= " and id = '" . $where['id'] . "'";
            }
        }else{
            $whereStr = '';
        }

        $result = array();
        $sql = "SELECT * FROM {$this->t_admin} {$whereStr}  LIMIT {$offset}, {$limit}";
        $query = $this->db->query($sql);
        $result['list'] = $query->result_array();
        $cntSql = "SELECT COUNT(*) AS cnt FROM {$this->t_admin} {$whereStr}";
        $cntQuery = $this->db->query($cntSql);
        $cntRow = $cntQuery->row_array();
        $result['total'] = $cntRow['cnt'];
        return $result;
    }


}