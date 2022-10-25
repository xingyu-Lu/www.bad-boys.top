<?php
namespace app\common\services;

use Yii;

class UtilService
{
    public static function getIp()
    {
        if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            Yii::warning('HTTP_X_FORWARDED_FOR: ' . $_SERVER["HTTP_X_FORWARDED_FOR"] . 'AND REMOTE_ADDR: ' . $_SERVER["REMOTE_ADDR"]);
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }

        Yii::warning('REMOTE_ADDR: ' . $_SERVER["REMOTE_ADDR"]);

        return isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '';
    }

    public static function getUa()
    {
        $ua = Yii::$app->request->userAgent;

        return $ua;
    }

    public static function ipToInt($ip)
    {
        $ip_int = ip2long($ip);

        return $ip_int;
    }

    public static function intToIp($ip_int)
    {
        $ip = long2ip($ip_int);

        return $ip;
    }
}
