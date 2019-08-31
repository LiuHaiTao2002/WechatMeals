<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/8
 * Time: 10:46
 */

namespace app\admin\model;

use think\Model;

class Order extends Model
{
    protected $pk = 'order_id',$order;
    //��ȡ������Ϣ
    public function getOrderFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getOrderList()
    {
        $res = $this->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getOrderPage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addOrderInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delOrderInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upOrderInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
    //��������ѯ
    public function getWhereOrder($where =[]){
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->find();
        return $res;
    }
}