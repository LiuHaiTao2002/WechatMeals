<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/8
 * Time: 10:51
 */

namespace app\admin\model;

use think\Model;

class Menu extends Model
{
    protected $pk = 'menu_id',$menu;
    //��ȡ������Ϣ
    public function getMenuFind($id)
    {
        return $this->get($id);
    }
    //��ȡ�����б�
    public function getMenuList()
    {
        $res = $this->order($this->pk,'desc')
            ->select();
        return $res;
    }
    //��ȡ��ҳ�б�
    public function getMenuPage($where = [],$psize)
    {
        $res = $this->where($where)
            ->order($this->pk,'desc')
            ->paginate($psize);
        return $res;
    }
    //�����Ϣ
    public function addMenuInfo($data = [])
    {
        $res = $this->allowField(true)
            ->save($data);
        return $res;
    }
    //ɾ��������Ϣ
    public function delMenuInfo($id)
    {
        $res = $this::destroy($id);
        return $res;
    }
    //�޸�ָ����Ϣ
    public function upMenuInfo($id,$data = [])
    {
        $res = $this->allowField(true)
            ->where($this->pk,$id)
            ->update($data);
        return $res;
    }
    //�ж��޸ĵ������Ƿ����
    public function isNameExists($name,$id)
    {
        $res = $this->where('menu_name',$name)->where($this->pk,'<>',$id)->find();
        return $res;
    }
}