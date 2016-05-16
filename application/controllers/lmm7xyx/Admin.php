<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Needlogin_Controller {
    private $_numOfPage = 10;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/AdminModel');

    }

    public function index(){
        $this->adminList();
    }

    /**
     *
     */
    public function adminList(){
        $this->load->view('auth/list');
    }

    /**
     *
     */
    public function ajaxGetList(){
        $data = array();
        $page = (int)$this->input->post('page',TRUE);
        $rows = (int)$this->input->post('rows',TRUE);
        $limit = !empty($rows)? $rows : $this->_numOfPage;
        $page = !empty($page) ? $page : 1;
        $offset = ($page-1)*$limit;



        $where = array();
        $res = $this->AdminModel->getAdminList($where,$limit,$offset);
        //var_dump($res);
        if(!empty($res['list']) && is_array($res['list'])){
            $list = array();
            foreach($res['list'] as $key=>&$val){
                $tmp = array();
                $tmp['id'] = $val['id'];
                $tmp['realname'] = $val['realname'];
                $tmp['nickname'] = $val['nickname'];
                $tmp['phone'] = $val['phone'];
                $tmp['create_time'] = $val['create_time'];
                $tmp['last_time'] = $val['last_time'];
                $tmp['status'] = $val['status'];
                if($val['status'] == 0){
                    $tmp['status_cn'] = '正常';
                }else{
                    $tmp['status_cn'] = '禁用';
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
