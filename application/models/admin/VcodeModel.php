<?php
/**
 * Created by PhpStorm.
 * User: jiapin
 * Date: 2016/4/26
 * Time: 16:23
 */
class VcodeModel extends CI_Model{
    private $t_admin = 'captcha';

    public function __construct()
    {
        $this->db = $this->load->database('default',TRUE);
    }

    public function addOne($data){
        $query = $this->db->insert_string('captcha', $data);
        $res = $this->db->query($query);
        return $res;
    }

    public function isRight($code){
        // First, delete old captchas
        $expiration = time() - 7200; // Two hour limit，2小时内
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        // Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($code, $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0)
        {
            return false;
        }else{
            return true;
        }
    }


}