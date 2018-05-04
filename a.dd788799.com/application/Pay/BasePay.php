<?php

namespace app\Pay;

trait BasePay {

    protected $request;
    protected $params;

    public function __construct($params) {
        $this->params  = $params;
        $this->request = request();
    }

    public function getName() {
        return $this->params['name'];
    }
    
    public function genOrderno() {
        return date("YmdHis").rand(100000,999999);         
    }

    protected function location($gateway, $method = 'get', $charset = 'utf-8'){
        return $this->form([],$gateway,$method,$charset);
    }

    protected function form($params, $gateway, $method = 'post', $charset = 'utf-8') {
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header("Content-type:text/html;charset={$charset}");
        $sHtml = "<form id='paysubmit' name='paysubmit' action='{$gateway}' method='{$method}'>";

        foreach ($params as $k => $v) {
            $sHtml.= "<input type=\"hidden\" name=\"{$k}\" value=\"{$v}\" />\n";
        }

        $sHtml = $sHtml . "</form>正在跳转 ...";

        $sHtml = $sHtml . "<script>document.forms['paysubmit'].submit();</script>";
        return $sHtml;
    }

    protected function post($url,$data){ #POST访问
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }   
        return $tmpInfo;      
    }

    public function check_success(){
        if($this->check_sign() && $this->pay_ok()){
            return true;
        }
        return false;
    }

    public function success() {
        echo "success";
    }
}