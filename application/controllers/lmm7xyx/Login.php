<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/adminModel');
    }

    public function index(){
        $this->login();
    }

    /**
     * 登录
     */
    public function login(){
        $this->load->view('Login');
    }

    /**
     * Index Page for this controller.
     */
    public function doLogin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone', '用户名', 'required');
        $this->form_validation->set_rules('passwd', '密码', 'required');
        //var_dump($_POST);die;
        if ($this->form_validation->run() == FALSE)
        {
            //echo json_encode(array('status'=>-1,'msg'=>'参数错误'));die;
            $this->load->view('fail',array(
                'jumpUrl'=>'javascript:history.back(-1);',
                'message'=>'账号或密码错误',
                'error'=>'',
                'waitSecond'=>5,
                'status'=>0,
                'msgTitle'=>''
            ));
        }
        else
        {
            $phone = $this->input->post('phone',TRUE);
            $passwd = $this->input->post('passwd',TRUE);

            $res = $this->adminModel->getInfoByPhone($phone);

            if(empty($res)){
                $this->load->view('fail',array(
                    'jumpUrl'=>'javascript:history.back(-1);',
                    'message'=>'未注册',
                    'error'=>'',
                    'waitSecond'=>5,
                    'status'=>0,
                    'msgTitle'=>''
                ));
            }

            //$passwd = md5('123456'. substr($phone,0,6));

            if(!empty($res['passwd']) && $res['passwd'] == md5($passwd.$res['salt'].'hongzhong')){//登录成功！
                //设置session
                //echo json_encode(array('status'=>1,'msg'=>'登录成功'));die;
                $this->load->view('success',array(
                    'jumpUrl'=>ADMIN_URL.'/main/index',
                    'message'=>'登录成功！',
                    'waitSecond'=>5,
                    'status'=>0,
                    'msgTitle'=>''
                ));
            }else{
                //echo json_encode(array('status'=>-1,'msg'=>'密码错误'));die;
                $this->load->view('fail',array(
                    'jumpUrl'=>'javascript:history.back(-1);',
                    'message'=>'密码错误',
                    'error'=>'',
                    'waitSecond'=>5,
                    'status'=>0,
                    'msgTitle'=>''
                ));
            }
        }


    }
}
