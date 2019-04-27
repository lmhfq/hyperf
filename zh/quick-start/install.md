# 安装

## 服务器要求

Hyperf 对系统环境有一些要求，仅可运行于 Linux 和 Mac 环境下，但由于 Docker 虚拟化技术的发展，在 Windows 下也可以通过 Docker for Windows 来作为运行环境。   

[hyperf-cloud\hyperf](https://github.com/hyperf-cloud/hyperf) 项目内已经为您准备好了一个 Dockerfile ，或直接基于已经构建好的 hyperf\hyperf 镜像来运行。   

当您不想采用 Docker 来作为运行的环境基础时，你需要确保您的运行环境达到了以下的要求：   

 - PHP >= 7.2
 - Swoole PHP 扩展 >= 4.3.1
 - OpenSSL PHP 扩展
 - JSON PHP 扩展
 - PDO PHP 扩展 （如需要使用到 MySQL 客户端）
 - Redis PHP 扩展 （如需要使用到 Redis 客户端）
 - Protobuf PHP 扩展 （如需要使用到 gRPC 服务端或客户端）


## 安装 Hyperf

Hyperf 使用 [Composer](https://getcomposer.org) 来管理项目的依赖，在使用 Hyperf 之前，请确保你的运行环境已经安装好了 Composer。

### 通过 `Composer` 创建项目
[hyperf-cloud/hyperf-skeleton](https://github.com/hyperf-cloud/hyperf-skeleton) 项目是我们已经为您准备好的一个骨架项目，内置了一些常用的组件及相关配置的文件及结构，是一个可以快速用于业务开发的 Web 项目基础。   
执行下面的命令可以于当前所在位置创建一个 hyperf-skeleton 项目
```
composer create hyperf/hyperf-skeleton 
```

## 存在兼容性的扩展

由于 Hyperf 基于 Swoole 协程实现，而 Swoole 4 带来的协程功能是 PHP 前所未有的，顾在与不少扩展都仍存在兼容性的问题。   
以下扩展（包括但不限于）都会造成一定的兼容性问题，不能与之共用或共存：

- xhprof
- xdebug
- blackfire
- trace
- uopz