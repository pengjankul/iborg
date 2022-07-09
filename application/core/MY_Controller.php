<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanitkeawtawan
 * Date: 2/22/13 AD
 * Time: 11:25 AM
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends  CI_Controller
{/**
 * The name of the module that this controller instance actually belongs to.
 *
 * @var string
 */
    public $module;

    /**
     * The name of the controller class for the current class instance.
     *
     * @var string
     */
    public $controller;

    /**
     * The name of the method for the current request.
     *
     * @var string
     */
    public $method;

    /**
     * Load and set data for some common used libraries.
     */
    public function __construct()
    {
        parent::__construct();
        $this->template->set_template($this->config->item('template'));
        $this->packets->template=$this->template;
        $this->packets->initial();
    }

    function checkLogIn(){
        if($this->session->userdata('sesUserOrg')!='' || $this->session->userdata('sesUserId')!=''){
            return true;
        }else{
            return false;
        }
    }

    function setView($name='',$data=array()){
        $this->template->content->view($name,$data);
    }
    function publish($data=array()){
        $this->template->publish(false,$data);
    }
    function js_thai_encode($data)
    {	// fix all thai elements
        if(is_object($data)){
            $data=(array) $data;
        }
        if (is_array($data))
        {
            foreach($data as $a => $b)
            {
                if(is_object($b)){
                    $b=(array) $b;
                }
                if (is_array($b))
                {
                    $data[$a] = $this->js_thai_encode($b);
                }
                else
                {

                    if(is_string($b)){ $data[$a] =($b!="")? @iconv("tis-620","utf-8",$b):""; }
                }
            }
        }
        else
        {
            if(is_string($data)) { $data =($data)?@iconv("tis-620","utf-8",$data):""; }
        }
        return $data;
    }
    function json_publish($data){
//        header('Content-Type: application/json; charset=utf-8');
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
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

    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
/**
 * Returns the CodeIgniter object.
 *
 * Example: ci()->db->get('table');
 *
 * @return \CI_Controller
 */
function ci()
{
    return get_instance();
}
