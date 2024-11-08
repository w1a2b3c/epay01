<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <title>USDT 在线收银台</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <style>
    @media (max-width: 1920px) {
  .widget {
    transform: scale(1.5, 1.5);margin-top: 12%;
  }
}
    /* 当屏幕宽度大于或等于1200px时，放大元素到原来的2.5倍 */
@media (max-width: 1200px) {
  .widget {
    transform: scale(1.5, 1.5);margin-top: 15%;
  }
}
/* 当屏幕宽度大于或等于900px时，放大元素到原来的2倍 */
@media (max-width: 900px) {
  .widget {
    transform: scale(1.2, 1.2);margin-top: 10%;
  }
}
        /* 当屏幕宽度大于或等于600px时，放大元素到原来的1.5倍 */
@media (max-width: 600px) {
  .widget {
    transform: scale(1.0, 1.0);margin-top: 10%;
  }
}
 

 

    </style>
</head>
<body id="body" class="load--preload">

    <div class="widget" data-current-status="new">
        <div class="widget__block">
            <div class="widget__header">
                
                                    <!--<img src="/media/merchants/da/da99/da999156a46e51a4599425166b5c18ef.png" alt="">-->
                                <div class="widget__header-info">
                    <h4>USDT 在线收银台</h4>
                                    </div>
                                    
            </div>
            <div class="widget__content">
                <div class="checkout-info__show" style="display: block;">
                    <div class="widget__props widget__props_header">
                                                    <div class="widget__alert widget__alert-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                打开加密钱包，扫描下面二维码，或者复制下面USDT-TRC20地址进行付款                            </font></font></div>
                                                <div class="widget__images">
                            <img src="/assets/img/usdt-logo.svg" alt="" class="widget__images-logo">

                                                        <div class="widget__qrcode">
                                <div class="widget__qrcode-list">
                                    <div class="widget__qrcode-list-item" id="qrcode" style="">
                                        
                                    </div>
                                </div>
                                
                            </div>
                                                    </div>
                    </div>
                </div>


                <div class="widget__alert widget__alert-warning" id="fn_checkout_info_timeout">
                    转账金额必须为下方显示的金额且需要在倒计时<span style="color:#4f73fd;"><span class="minutes">00</span>:<span class="seconds">00</span></span>内完成转账，否则无法被系统确认！
                </div>
                                    
                <div class="checkout-info__show" style="display: block;">
                    <div class="widget__props">
                                                    <div class="input__group">
                                <label for="sum"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址 USDT TRC20</font></font></label>
                                <div class="input__group-copy">
                                    <button type="button" class="btn btn-info btn-sm btn-icon input__group-copy_button" data-clipboard-text="<?= $address; ?>" id="address">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                            复制                                        
                                            </font>
                                        </font>
                                        <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.45222 0H3.33333C2.72056 0 2.22222 0.489818 2.22222 1.09091V8.72727C2.22222 9.32891 2.72056 9.81818 3.33333 9.81818H8.88889C9.50167 9.81818 10 9.32891 10 8.72727V2.50145L7.45222 0ZM6.66667 3.27273V0.545455L9.44444 3.27273H6.66667Z" fill="white"></path>
                                            <path d="M1.11111 2.18182H0V10.9091C0 11.5107 0.498333 12 1.11111 12H7.77778V10.9091H1.11111V2.18182Z" fill="white"></path>
                                        </svg>
                                    </button>
                                    <input name="sum" type="text" placeholder="付款金额" value="<?= $address; ?>" readonly="">
                                </div>
                            </div>
                            <div class="input__group">
                                <label for="sum"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">我们应该收到的确切 USDT 金额</font></font></label>
                                <div class="input__group-copy">
                                    <button type="button" class="btn btn-info btn-sm btn-icon input__group-copy_button" data-clipboard-text="<?= $usdt; ?>" id="usdt">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                            复制                                        
                                            </font>
                                        </font>
                                        <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.45222 0H3.33333C2.72056 0 2.22222 0.489818 2.22222 1.09091V8.72727C2.22222 9.32891 2.72056 9.81818 3.33333 9.81818H8.88889C9.50167 9.81818 10 9.32891 10 8.72727V2.50145L7.45222 0ZM6.66667 3.27273V0.545455L9.44444 3.27273H6.66667Z" fill="white"></path>
                                            <path d="M1.11111 2.18182H0V10.9091C0 11.5107 0.498333 12 1.11111 12H7.77778V10.9091H1.11111V2.18182Z" fill="white"></path>
                                        </svg>
                                    </button>
                                    <input name="sum" type="text" placeholder="发送的确切金额" value="<?= $usdt; ?>" readonly="" id="fn_widget_pay_total_sum">
                                    <div class="input__group-notify" id="fn_notify_sum" style="display: none;">
                                        <div id="fn_notify_sum_text"></div>
                                        <button type="button" class="input__group-notify-button" >
                                            <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 13L10 16L17 9" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                        <div class="input__group-notify-bgs"></div>
                                    </div>
                                </div>
                            </div>

                            

                                                
                    </div>
                </div>


                



            </div>
        </div>

    </div>


    

<script src="<?php echo $cdnpublic?>jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo $cdnpublic?>clipboard.js/1.7.1/clipboard.min.js"></script>
<script src="<?php echo $cdnpublic ?>layer/3.1.1/layer.js"></script>
<script src="<?php echo $cdnpublic ?>jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <!--<script src="./付款付款号321183_files/jquery.js"></script>-->

    <script>// 检查是否支付完成
    function loadmsg() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/getshop.php",
            timeout: 10000, //ajax请求超时时间10s
            data: {type: "alipay", trade_no: "<?php echo $order['trade_no']?>"}, //post数据
            success: function (data, textStatus) {
                //从服务器得到数据，显示数据并继续查询
                if (data.code == 1) {
                    layer.msg('支付成功，正在跳转中...', {icon: 16, shade: 0.1, time: 15000});
                    setTimeout(window.location.href = data.backurl, 1000);
                } else {
                    setTimeout("loadmsg()", 2000);
                }
            },
            //Ajax请求超时，继续查询
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                if (textStatus == "timeout") {
                    setTimeout("loadmsg()", 1000);
                } else { //异常
                    setTimeout("loadmsg()", 3000);
                }
            }
        });
    }

    function checkresult() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/getshop.php",
            timeout: 10000, //ajax请求超时时间10s
            data: {type: "alipay", trade_no: "<?php echo $order['trade_no']?>"},
            success: function (data, textStatus) {
                //从服务器得到数据，显示数据并继续查询
                if (data.code == 1) {
                    layer.msg('支付成功，正在跳转中...', {icon: 16, shade: 0.1, time: 15000});
                    setTimeout(window.location.href = data.backurl, 1000);
                } else {
                    layer.msg('您还未完成付款，请继续付款', {shade: 0, time: 1500});
                }
            }
        });
    }

    $(function () {
        $('#qrcode').qrcode({
            text: "<?= $address; ?>",
            width: 120,
            height: 120,
            foreground: "#000000",
            background: "#ffffff",
            typeNumber: -1
        });

        (new Clipboard('#usdt')).on('success', function (e) {
            layer.msg('金额复制成功');
        });
        (new Clipboard('#address')).on('success', function (e) {
            layer.msg('地址复制成功');
        });

        // 支付时间倒计时
        function clock() {
            let timeout = new Date(<?=$valid; ?>);
            let now = new Date();
            let ms = timeout.getTime() - now.getTime();//时间差的毫秒数
            let second = Math.round(ms / 1000);
            let minute = Math.floor(second / 60);
            let hour = Math.floor(minute / 60);
            if (ms <= 0) {
                layer.alert("支付超时，请重新发起支付！", {icon: 5});
                return;
            }

            $('.hours').text(hour.toString().padStart(2, '0'));
            $('.minutes').text(minute.toString().padStart(2, '0'));
            $('.seconds').text((second % 60).toString().padStart(2, '0'));

            return setTimeout(clock, 1000);
        }

        setTimeout(clock, 1000);

        setTimeout("loadmsg()", 2000);
    });</script>
   
</body>
</html>