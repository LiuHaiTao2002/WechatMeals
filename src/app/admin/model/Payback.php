<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/8
 * Time: 10:46
 */

namespace app\admin\model;

use think\Model;
use think\Session;
use think\Cookie;
use think\Db;
use think\Request;

class Payback extends Model
{
    protected $pk = 'payback_id',$Payback;
    //��ȡ������Ϣ
    public function getPaybackFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getPaybackList($limitRows = 10)
    {
        $res = $this->limit($limitRows)
            ->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getPaybackPage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addPaybackInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delPaybackInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upPaybackInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
}