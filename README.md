## 介绍

本项目可以用于测试对应的接口，需要可以自行扩展批量测试。

## PHPUnit安装

[参考链接](https://phpunit.de/manual/6.5/zh_cn/installation.html)

## 运行
1. 把本项目clone下来后，配置phpunit.cmd（此文件如何产生请参考[链接](https://phpunit.de/manual/6.5/zh_cn/installation.html)里面的安装步骤）文件所在的目录的环境变量
2. (可选) 【1】clone下来的项目放进已配置好的PHP可运行环境中，直接运行项目里的 test\index.php文件
截图：
![](http://pic.yijianku.com/Fm6hINADLqgnHjnSXDDqfP_hhoZf)
或
【2】cmd命令执行，切换目录到 test 目录下执行 `phpunit tests\UserTest.php` 命令 （注：当前命令为测试tests目录下的UserTest.php文件），如想测试tests目录下的全部文件可以执行 `phpunit tests`
截图：
![](http://pic.yijianku.com/Fm4OtpbF6aeiMxoqAQO1xX881ccv)
## PHPUnit文档
[参考链接](https://phpunit.de/manual/6.5/zh_cn/installation.html)
