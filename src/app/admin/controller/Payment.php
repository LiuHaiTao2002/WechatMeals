<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/3
 * Time: 9:15
 */

namespace app\admin\controller;

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Console;
use think\Config;
use think\Db;
use think\Cookie;
use think\Exception;
use think\Session;

class Payment extends Controller
{
    protected $rst,$payback;
    public function _initialize()
    {
        $this->rst = Request::instance();
        $this->payback = new \app\admin\model\Payback();
    }
    //�ͷѲ���
    public function payBack($where = [],$name="",$start="",$end="")
    {
        if($name){
            $name != '' ? $where['user_name'] = ['like','%'.$name.'%'] : '';
        }
        if($start || $end){
            $start = strtotime($start.'00:00:00');
            $end = strtotime($end.'23:59:59');
            $where['create_time'] = ['between time', [$start, $end]];
        }
        $res = Db::name('payback')->alias('a')
            ->join('user b','a.user_id=b.user_id')
            ->join('menu c','a.menu_id=c.menu_id')
            ->field('a.*,b.user_name,b.user_mobile,c.menu_name')
            ->order('a.create_time desc')
            ->paginate(10);

        $page = $res->render();

        $this->assign('page',$page);
        $this->assign('res',$res);
        return $this->fetch('payBack');
    }
    //�ͷѲ��ɼ�¼ɾ��
    public function delPayBack()
    {
        $id = $this->rst->param('id');
        $res = $this->payback->delPaybackInfo($id);
        return $res;
    }
    //ǿ���ջ�ִ��
    public function confirmReceipt()
    {
        $id = $this->rst->param('id');
        $data['payback_status'] = $this->rst->get('status');
        $res = $this->payback->upPaybackInfo($id,$data);
        return $res;
    }
    //�ܹ����Ѽ�¼
    public function consumerRecord()
    {
        return $this->fetch('consumerRecord');
    }
    //���ýɷ�ʱ��
    public function setPayTime()
    {
        return $this->fetch('setPayTime');
    }
    //����ʱ������
    public function PayTime()
    {
        $data = $this->rst->post();
        $result = Db::name('paytime')->insert($data);
        if($result){
            $xhr = ['status'=>1];
        }else{
            $xhr = ['status'=>0];
        }
        return json_encode($xhr);
    }
}