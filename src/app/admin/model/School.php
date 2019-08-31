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

class School extends Model
{
    protected $pk = 'school_id',$school;
    //��ȡ������Ϣ
    public function getSchoolFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getSchoolList()
    {
        $res = $this->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getSchoolPage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addSchoolInfo($data = [])
    {
        $res = $this->allowField(true)
                ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delSchoolInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upSchoolInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
    //�ж��޸ĵ������Ƿ����
    public function isNameExists($name,$id)
    {
        $res = $this->where('school_name',$name)->where($this->pk,'<>',$id)->find();
        return $res;
    }
}