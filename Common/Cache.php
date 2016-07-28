<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/7/10
 * Time: 上午8:54
 * 必须配合php_memcache使用。详情请查看http://www.cnblogs.com/CyLee/p/5599271.html
 */


//设置缓存
function set_cache($key,$value,$expireTime)
{
    $m = new Memcache();
    $m->connect(CACHE_IP,CACHE_PORT);
    $m->set($key,$value,0,$expireTime);
}

//获取缓存
function get_cache($key)
{
    $m = new Memcache();
    $m->connect(CACHE_IP,CACHE_PORT);
    return $m->get($key);
}


?>