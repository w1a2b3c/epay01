<?php

class usdt1_plugin

{

    public static $info = [
        'name'     => 'usdt1',
        'showname' => 'USDT收款',
        'author'   => '',
        'link'     => '',
        'types'    => ['usdt1'],
        'inputs'   => [
            'appid'  => [
                'name' => 'USDT-TRC20 收款地址',
                'type' => 'input',
                'note' => '确保地址正确，收款错误无法追回',
            ],
            'appkey' => [
                'name' => '交易汇率（CNY）',
                'type' => 'input',
                'note' => '举例：7.3',
            ],
            'appurl' => [
                'name' => '超时时长（秒）',
                'type' => 'input',
                'note' => '建议20分钟；填：1200',
            ],
            'botid' => [
                'name' => '机器账号ID',
                'type' => 'input',
                'note' => '你的机器账号ID，如不知道ID，可给https://t.me/EShopFakaBot 发送 /me 获取用户ID',
            ],
            'bottoken' => [
                'name' => '机器人token',
                'type' => 'input',
                'note' => '从https://t.me/BotFather 创建机器人时，会给你BotToken',
            ],
            'xiaoshu' => [
                'name' => 'usdt小数位数',
                'type' => 'input',
                'note' => '例如填写：2   金额为2.01保留的小数长度为2,最多5位小数。',
            ],
        ],
        'select'   => null,
        'note'     => '',
    ];

    public static function submit()
    {
        global $channel, $order, $conf, $DB, $cdnpublic;

        $valid   = (strtotime($order['addtime']) + intval($channel['appurl'])) * 1000;
        $address = $channel['appid'];
        $rate    = self::getRate();
        $usdt    = round($order['realmoney'] / $rate, intval($channel['xiaoshu']));
        $get_param = isset($_POST['param'])?$_POST['param']:'';
        $expire  = date('Y-m-d H:i:s', strtotime($order['addtime']) - intval($channel['appurl']));;
        $params = [$channel['id'], 0, $expire, $order['trade_no'], $order['money']];
        $row    = $DB->getRow('select * from pre_order where channel = ? and status = ? and addtime >= ? and trade_no != ? and money = ? order by param desc limit 1', $params);
        // echo $order['realmoney'] / $rate;exit;
        // echo '123';
        // var_dump($channel);exit;
        // echo $row['param'];exit;
        if ($row) {
            $usdt = bcadd($row['usmoney'], 0.01, $channel['xiaoshu']);
        }
        //ALTER TABLE `pay_order` ADD `usmoney` DECIMAL(10,2) NOT NULL DEFAULT '0' COMMENT '转换币' AFTER `money`;
        if($get_param){
            $DB->exec('update pre_order set param = ? where trade_no = ?', [$get_param, $order['trade_no']]);
        }
        $DB->exec('update pre_order set usmoney = ? where trade_no = ?', [$usdt, $order['trade_no']]);
        // $msg="<p style='color:red;'>您有新的订单</p>用户邮箱：".$get_param.'正在给您建立交易。';
//         $msg=urlencode('
// <b>您有新的订单 ('.$order['realmoney'].'CNY)</b> 

// 用户邮箱：'.$get_param.'
// 订单编号：'.$order['trade_no'].'
// 原始金额：'.$order['realmoney'].' <b>CNY</b>
// 订单金额：'.$usdt.' <b>USDT</b>
// 付款地址：TFXyzUsQCdxr3xphhsHEXCrHuuqNmn7Dvp
// 收款地址：TJUpNF81NLcguZ4xGMYab99d3qK9qSjYqB
// 创建时间：'.$order['addtime'].'
// 支付时间：'.date('Y-m-d H:i:s',1726823835).'
// 交易哈希：14c18bf8086cb9a530b7b59fa5867bb2b4d1abea3aaa9ff68f4952769b472ef8<a href="https://www.tok88.cn/find_order.html">查看交易</a>
//         ');
//         $api_send_msg = "https://api.telegram.org/bot7275469484:AAHIXlSy-T2y8k7Wtr0EIzSW7zUVmZHdE5Q/sendMessage?chat_id=7252592903&parse_mode=html&text=$msg";
//         file_get_contents($api_send_msg);
        // get_curl($api_send_msg);
        ob_clean();
        header("application:text/html;charset=UTF-8");

        define('PLUGIN_PATH', __DIR__ . '/');

        require_once PLUGIN_PATH . '/pay.php';
        
        exit(0);
    }

    public static function getRate(): float
    {
        global $channel;
        return floatval($channel['appkey']);
        if (isset($channel['appkey']) && $channel['appkey'] > 0) {

            return floatval($channel['appkey']);
        }

        $api    = 'https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/chart?id=825&range=1H&convertId=2787';
        $resp   = get_curl($api);
        $data   = json_decode($resp, true);
        $points = $data['data']['points'];
        $point  = array_pop($points);

        return floatval($point['c'][0]);
    }

    public static function cron(array $channel)
    {
        global $DB;
        $channel_config = json_decode($channel['config'], true);
        $bot_id =$channel_config['botid'];
        $bot_token =$channel_config['bottoken'];
        $list    = self::getTransferInList($channel_config['appid'], 24);
        define('PLUGIN_PATH', __DIR__ . '/');
        // file_put_contents(PLUGIN_PATH.'log.txt',json_encode($list[0]));
        $addtime = date('Y-m-d H:i:s', time() - intval($channel_config['appurl']));
        $rows    = $DB->query('select * from pre_order where channel = ? and status = ? and addtime >= ?', [$channel['id'], 0, $addtime]);
        while ($order = $rows->fetch(PDO::FETCH_ASSOC)) {
            foreach ($list as $item) {
                if ($item['money'] == $order['usmoney'] && $item['time'] >= strtotime($order['addtime'])) {
                    if($bot_token){
                        $msg=urlencode('
<b>您有新的订单 ('.$order['realmoney'].'CNY)</b> 

用户邮箱：'.$order['param'].'
订单编号：'.$order['trade_no'].'
原始金额：'.$order['realmoney'].' <b>CNY</b>
订单金额：'.$item['money'].' <b>USDT</b>
付款地址：'.$item['buyer'].'
收款地址：'.$channel_config['appid'].'
创建时间：'.$order['addtime'].'
支付时间：'.date('Y-m-d H:i:s',$item['time']).'
交易哈希：'.$item['trade_id'].'<a href="https://www.tok88.cn/find_order.html?email='.$order['param'].'">查看交易</a>
        ');
                    $api_send_msg = "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$bot_id&parse_mode=html&text=$msg";
                    file_get_contents($api_send_msg);
                    }
                    
                    processNotify($order, $item['trade_id'], $item['buyer']);
                    echo sprintf("订单回调成功：%s\n", $order['trade_no']);
                }
            }
        }

        echo "---[监控执行结束： " . date('Y-m-d H:i:s') . "]---\n";
    }

    public static function getTransferInList(string $address, int $hour = 3): array
    {
        $result = [];
        $end    = time() * 1000;
        $start  = strtotime("-$hour hour") * 1000;
        $params = [
            'limit'           => 300,
            'start'           => 0,
            'direction'       => 'in',
            'relatedAddress'  => $address,
            'start_timestamp' => $start,
            'end_timestamp'   => $end,
        ];
        $api    = "https://apilist.tronscan.org/api/token_trc20/transfers?" . http_build_query($params);
        $resp   = get_curl($api);
        $data   = json_decode($resp, true);

        if (empty($data)) {

            return $result;
        }

        foreach ($data['token_transfers'] as $transfer) {
            if ($transfer['to_address'] == $address && $transfer['finalResult'] == 'SUCCESS') {
                $result[] = [
                    'time'     => $transfer['block_ts'] / 1000,
                    'money'    => $transfer['quant'] / 1000000,
                    'trade_id' => $transfer['transaction_id'],
                    'buyer'    => $transfer['from_address'],
                ];
            }
        }

        return $result;
    }
}