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


}