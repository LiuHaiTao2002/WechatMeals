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

class Grade extends Model
{
    protected $pk = 'grade_id',$grade;
    //��ȡ������Ϣ
    public function getGradeFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getGradeList($limitRows = 10)
    {
        $res = $this->limit($limitRows)
            ->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getGradePage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addGradeInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delGradeInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upGradeInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
    //�ж��޸ĵ������Ƿ����
    public function isNameExists($name,$id)
    {
        $res = $this->where('grade_name',$name)->where($this->pk,'<>',$id)->find();
        return $res;
    }
}