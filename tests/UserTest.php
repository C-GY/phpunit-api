<?php
require __dir__ . '/../vendor/autoload.php';  //加载自动载入
require_once "./lib/Request.php";       //加载自己的自定义post get方法
use PHPUnit\Framework\TestCase;
class UserTest extends TestCase
{

    /**
     * 检测GET请求
     */
    public function testGet()
    {
        $res = Request::do_get(Request::getRequestURL("test/get"),['name'=>'111']);
        $obj = json_decode($res, true);
        $this->assertEquals($obj['code'], 0, $res);
        return $obj;
    }


    /**
     * 检测POST请求
     */
    public function testPost()
    {
        $res = Request::do_post(Request::getRequestURL("test/post"),['name'=>'111','sex'=>22]);
        $obj = json_decode($res, true);
        $this->assertEquals($obj['code'], 0, $res);
        return $obj;
    }



    public function testDemo()
    {
        $res = Request::do_get(Request::getRequestURL("jichu/jichu/index"));
        echo $res;
        $obj = json_decode($res, true);
        $this->assertEquals($obj['code'], 0, $res);
        return $obj;
    }


    /**
     * 检测数据是否为空
     */
    public function testEmpty()
    {
        $this->assertEmpty('1');
    }
    /**
     * 检测是否相等
     */
    public function testEquals()
    {
        $this->assertEquals("true", 'true');
    }

    
}
