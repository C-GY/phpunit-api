<?php
require __dir__ . '/../vendor/autoload.php';  //加载自动载入
require_once "./lib/Functions.php";       //加载自己的自定义post get方法
use PHPUnit\Framework\TestCase;
class StackTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack) - 1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}
