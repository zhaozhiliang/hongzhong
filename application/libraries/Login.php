<?php
/**
 * Created by PhpStorm.
 * User: jiapin
 * Date: 2016/4/20
 * Time: 15:08
 */
class Login
{

    private $error = array();
    private $CI;

    function __construct()
    {
        $this->CI =& get_instance();
       $this->CI->load->library('session');
    }

    /**
     * 登录，成功返回TRUE
     * (用户已存在并没有被禁用，密码正确), 其他就FALSE
     */
    function login($login, $password, $remember = false)
    {

    }


    /**
     * 登出
     */
    function logout()
    {
        //清除cookie， session
    }

    /**
     * 是否登录了哪？
     */
    function is_logged_in()
    {
        $uid = $this->CI->session->uid;
        if(!empty($uid)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 获取 user_id
     */
    function get_user_id()
    {
        return $this->CI->session->userdata('uid');
    }


    /**
     * 返回错误
     */
    function get_error_message()
    {
        return $this->error;
    }

    /**
     * 保存自动登录
     */
    private function create_autologin($user_id, $pwd, $is_admin)
    {
        $this->CI->load->helper('cookie');

        $key = substr(md5(uniqid(rand() . get_cookie($this->CI->config->item('sess_cookie_name')))), 0, 16);

        set_cookie(array('name' => 'evt_autologin', 'value' => serialize(array('user_id' => $user_id, 'key' => $key, 'md5' => $pwd, 'Is_admin' => $is_admin)), 'expire' => 60 * 60 * 24 * 7));

        return TRUE;

    }

    /**
     * 删除自动登录
     */
    private function delete_autologin()
    {
        $this->CI->load->helper('cookie');

        $cookie = get_cookie('evt_autologin', TRUE);
        if ($cookie) {
            delete_cookie('evt_autologin');
        }
    }

    /**
     * 自动登录
     */
    private function autologin()
    {

    }

}
//--------------------------------------------------------------------------