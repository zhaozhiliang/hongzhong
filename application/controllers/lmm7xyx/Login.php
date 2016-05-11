<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/adminModel');
        $this->load->model('admin/vcodeModel');
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
            $code = $this->input->post('code',TRUE);

            //验证码，验证
            $res_code = $this->vcodeModel->isRight($code);
            //var_dump($res_code);die;
            if(!$res_code){
                $this->load->view('fail',array(
                    'jumpUrl'=>'javascript:history.back(-1);',
                    'message'=>'验证码不正确',
                    'error'=>'',
                    'waitSecond'=>5,
                    'status'=>0,
                    'msgTitle'=>''
                ));
                return ;  //必须加上return不然执行到这里程序还要继续
            }



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
                return ;
            }

            //$passwd = md5('123456'. substr($phone,0,6));

            if(!empty($res['passwd']) && $res['passwd'] == md5($passwd.$res['salt'].'hongzhong')){//登录成功！
                //设置session
                //echo json_encode(array('status'=>1,'msg'=>'登录成功'));die;
                $this->load->view('success',array(
                    'jumpUrl'=>ADMIN_URL.'/main/index',
                    'message'=>'登录成功！',
                    'waitSecond'=>2,
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

    /**
     * 验证码输出
     */
    public function vcode(){
        $this->load->helper('captcha');
        $vals = array(
            'word'      => rand(1000,9999),
            'img_path'  => './uploads/captcha/',
            'img_url'   => IMAGE_URL.'/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '80',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 4,
            'font_size' => 20,
            'img_id'    => 'Imageid',
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        //var_dump($cap['image']);die;

        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );

        $res = $this->vcodeModel->addOne($data);
        if($res){
            header('Content-type: image/jpg');
            echo file_get_contents(IMAGE_URL.'/captcha/'.$cap['filename']);
        }

    }
}
