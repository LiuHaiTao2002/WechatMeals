<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/8
 * Time: 11:02
 */

namespace app\admin\model;

use think\Model;

class ClassRoom extends Model
{
    protected $name = 'class';
    protected $pk = 'class_id';
    public function initialize(){
        parent::initialize();
    }
    //��ȡ������Ϣ
    public function getClassFind($id)
    {
       return $this->get($id);
    }
    //��ȡ�����б�
    public function getClassList()
    {
        $res = $this->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getClassPage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addClassInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delClassInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upClassInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
    //�ж��޸ĵ������Ƿ����
    public function isNameExists($name,$id)
    {
        $res = $this->where('class_name',$name)->where('school_id','eq',$id)->find();
        return $res;
    }
}