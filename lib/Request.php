<?php

class Request
{

    //项目
    protected static $projectName = 'zy';
    //请求URL
    protected static $URL = "http://www.n.com/n/";

    /**
     * 获取请求路径
     * @param $uri  (jichu/main/index)
     * @return string
     */
    public static function getRequestURL($uri=''){
        return self::$URL.self::$projectName."/index/".$uri;
    }

    /**
     * 发起GET请求
     * @param $url  //请求路径
     * @param $params  //参数
     * @return bool|string
     */
    public static function do_get($url, $params=[]) {
        if (!empty($params)) {
            $url = "{$url}?" . http_build_query ($params);
        }
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
        return $result;

    }

    /**
     * 发起POST请求
     * @param $url  //请求路径
     * @param array $params  //参数
     * @param array $headers  //请求头参数
     * @return bool|string
     */
    public static function do_post($url, $params = [], $headers = []) {

        if (empty($url)) {
            return false;
        }
//        $headers=array(
//                "Content-Type: application/x-www-form-urlencoded",
//                "Content-Type:application/json;charset=utf-8",
//                "Accept:application/json;charset=utf-8",
////                "Cookie:PHPSESSID=ntcmeoj9kvag0p3e90qagjsgagvtg45jsth69mii; ci_session_n_zy_ii998=2li9agkid1vdbc9rot2pdc8ltl34bquclk8o8pl0"
//            );
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params)); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return $result;

    }
}
