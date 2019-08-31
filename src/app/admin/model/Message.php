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

class Message extends Model
{
    protected $pk = 'message_id',$Message;
    //��ȡ������Ϣ
    public function getMessageFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getMessageList($limitRows = 10)
    {
        $res = $this->limit($limitRows)
            ->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getMessagePage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addMessageInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delMessageInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upMessageInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
}