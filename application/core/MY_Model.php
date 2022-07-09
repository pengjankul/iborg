<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: hackcomp
 * Date: 11/10/2556
 * Time: 0:09 น.
 * To change this template use File | Settings | File Templates.
 */
class MY_Model extends  CI_Model{
    public $table=array();
    public function __construct() {

        ########### EAS ##############
        $this->table['user']="eas_user";
        $this->table['user_log']="eas_log";
        $this->table['org']="eas_organization";
        $this->table['eas_user_group']="eas_user_group";
    }

    public function _sussess($message='',$values="",$code="0"){
        return array(
            'error'=>false,
            'code'=>$code,
            'message'=>$message,
            'values'=>$values,
        );
    }
    public function _error($message='',$values="",$code="0"){
        return array(
            'error'=>true,
            'code'=>$code,
            'message'=>$message,
            'values'=>$values,
        );

    }
}