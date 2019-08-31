<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/8
 * Time: 14:57
 */

namespace app\admin\model;


use think\Model;

class Refund extends Model
{
    protected $pk = 'refund_id',$refund;
    //��ȡ������Ϣ
    public function getRefundFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getRefundList()
    {
        $res = $this->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getRefundPage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addRefundInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delRefundInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upRefundInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
}