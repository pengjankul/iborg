<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Top
 * Date: 12/25/13 AD
 * Time: 4:16 PM
 * To change this template use File | Settings | File Templates.
 */
class Permission
{
    private $_ci;

    public function __construct()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->library('session');
    }

    public function isLogIn()
    {
        if ($this->_ci->session->userdata('sesUserId') == '') {
            return false;
        } else {
            return true;
        }
    }

    public function checkLogin()
    {
        if (!$this->isLogIn()) {
            $this->_ci->session->set_userdata('last_page', current_url());
            redirect(base_url());
        }
    }

    // public function getPermission($app, $user_id)
    // {
    //     $sessPer = $this->_ci->session->userdata($app);
    //     if (empty($sessPer)) {
    //         $permission = $this->_ci->permission_model->getPermission($user_id, $app);
    //         $sessData[$app] = $permission;

    //         $this->_ci->session->set_userdata($sessData);
    //     }
    // }

    // public function getAccessApp($app, $user_id)
    // {
    //     $acess = $this->_ci->permission_model->getAccessApp($user_id, $app);
    //     if (@$acess == 2) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}
