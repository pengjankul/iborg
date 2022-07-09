<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanitkeawtawan
 * Date: 7/30/13 AD
 * Time: 10:01 AM
 * To change this template use File | Settings | File Templates.
 */

class Packets
{
    public $template;
    private $_ci;
    private $listpackets = array();
    private $temp = array();
    public function __construct()
    {
        $this->_ci = &get_instance();

     

        // datepicker
        $this->listpackets['datepicker']['css'] = array(
            "assets/vendor/bootstrap-datepicker-thai/css/datepicker.css",
        );
        $this->listpackets['datepicker']['js'] = array(
            "assets/vendor/bootstrap-datepicker-thai/js/bootstrap-datepicker.js",
            "assets/vendor/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js",
            "assets/vendor/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js",

        );


    }
    public function initial()
    {

    }

    public function install_jslanguage($jslanguage = "", &$template = "")
    {
        $this->temp = array();
        if ($jslanguage != "") {
            $url = 'assets/js/language/' . $this->_ci->config->item('language') . '/' . $jslanguage . '_lang.js';
            array_push($this->temp, '<script src="' . htmlspecialchars(strip_tags($this->genurl($url))) . '"></script>' . "\n\t");
            if ($template) {
                $template->javascript->add($url);
            }
        }
        return $this->temp;
    }

    public function install($packetsName = "")
    {
        //print_r(ENVIRONMENT);
        $this->temp = array();
        $rootPath = $this->getRootPath();
        if (array_key_exists($packetsName, $this->listpackets)) {
            if (array_key_exists('css', $this->listpackets[$packetsName])) {
                // �óշ������� mode development
                if (ENVIRONMENT != "development") {
                    $css_content = "/* created : " . date("YY:MM:dd") . "*/";
                    $outputFile = $packetsName;

                    $lessfile = $rootPath . "assets/less/" . $outputFile . ".less";
                    $cssfile_real = $rootPath . "assets/css/compressed/" . $outputFile . ".min.css";
                    $cssfile = "assets/css/compressed/" . $outputFile . ".min.css";
                    if (!file_exists($cssfile_real)) {
                        foreach ($this->listpackets[$packetsName]['css'] as $css) {
                            $css_content .= file_get_contents($css);
                        }
                        @file_put_contents($lessfile, $css_content);
                        $less = $this->_ci->lessphp->object();
                        $less->setFormatter("compressed");
                        try {
                            $this->_ci->lessphp->object()->checkedCompile($lessfile, $cssfile_real);
                        } catch (Exception $ex) {
                            echo "lessphp fatal error: " . $ex->getMessage();
                        }
                    }
                    if ($this->template) {
                        $this->template->stylesheet->add($cssfile);
                    }
                } else {
                    if (array_key_exists('css', $this->listpackets[$packetsName])) {
                        foreach ($this->listpackets[$packetsName]['css'] as $css) {
                            if ($this->template) {
                                $this->template->stylesheet->add($css);
                            }
                        }
                    }
                }
            }

            if (array_key_exists('js', $this->listpackets[$packetsName])) {
                // �óշ������� mode development
                if (ENVIRONMENT != "development") {
                    $js_content = "/* created : " . date("YY:MM:dd") . "*/";
                    $jsfile_real = $rootPath . "assets/js/compressed/" . $outputFile . ".js";
                    $jsfile = "assets/js/compressed/" . $outputFile . ".min.js";
                    $outputFile = $packetsName;
                    $lessfile = $rootPath . "assets/less/" . $outputFile . ".js";
                    if (!file_exists($jsfile_real)) {
                        foreach ($this->listpackets[$packetsName]['js'] as $js) {
                            $js_content .= file_get_contents($js);
                        }
                        @file_put_contents($jsfile, $js_content);
                    }
                    if ($this->template) {
                        $this->template->javascript->add($jsfile);
                    }
                } else {
                    if (array_key_exists('js', $this->listpackets[$packetsName])) {
                        foreach ($this->listpackets[$packetsName]['js'] as $js) {
                            if ($this->template) {
                                $this->template->javascript->add($js);
                            }
                        }
                    }
                }
            }

            //            if(array_key_exists('js',$this->listpackets[$packetsName])){
            //                foreach($this->listpackets[$packetsName]['js'] as $js){
            //                    if($this->template){
            //                        $this->template->javascript->add($js);
            //                    }
            //                }
            //            }
        }
        return $this->temp;
    }

    private function genurl($url)
    {
        if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
            $url = $this->_ci->config->item('base_url') . $url;
        }
        return $url;
    }
    private function getRootPath()
    {
        $str = "";
        $str = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']);
        $str = str_replace("index.html", "", $str);
        return $str;
    }
}
