<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/16
 * Time: 13:22
 */

namespace app\api\controller;

use think\Controller;

class Wxtoken extends Controller
{
    public function index()
    {
        $nonce     = $_GET['nonce'];
        $token     = 'diancang';
        $timestamp = $_GET['timestamp'];
        $echostr   = $_GET['echostr'];
        $signature = $_GET['signature'];
        //�γ����飬Ȼ���ֵ�������
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //ƴ�ӳ��ַ���,sha1���� ��Ȼ����signature����У��
        $str = sha1( implode( $array ) );
        if( $str  == $signature && $echostr ){
            //��һ�ν���weixin api�ӿڵ�ʱ��
            echo  $echostr;
            exit;
        }else{
            exit;
        }
    }


}