<?php
define('CURR_PATH', dirname(__DIR__));
require CURR_PATH . '/../includes/common.php';
require CURR_PATH . '/usdt1/usdt1_plugin.php';

if (function_exists("set_time_limit")) {
    @set_time_limit(0);
}

$id      = intval($argv[1]);
$channel = $DB->getRow('select * from pre_channel where id = ? limit 1', [$id]);
if (!$channel) {

    exit("错误：没找到该USDT支付通道\n");
}
if ($channel['plugin'] != 'usdt1') {

    exit("错误：该支付通道不是USDT插件\n");
}

usdt1_plugin::cron($channel);

