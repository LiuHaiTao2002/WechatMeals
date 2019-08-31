<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/6
 * Time: 17:09
 */
namespace app\admin\model;

use think\Model;
use think\Request;
use think\Db;
use think\Cookie;
use think\Session;

class Index extends Model
{
    protected $table = 'admin';
    protected $pk = 'admin_id';
    //��ʼ��
    public function _initialize()
    {
        parent::initialize();
        $this->table = new \stdClass;
    }
    //��֤��¼��Ϣ
    public function adminLogin($data)
    {
        $res = Db::name($this->table)
            ->where(['admin_name'=>$data['admin_name'],'admin_pwd'=>md5(sha1($data['admin_pwd'])),'admin_status'=>1])
            ->find();
        if(!empty($res)){
            $ip = request()->ip();
            $admin_id = $res['admin_id'];
            Db::name($this->table)->where('admin_id',$admin_id)->update(
                [
                    'login_number' => $res['login_number']+1
                ]
            );
            Db::name('admin_log')->insert(
                [
                    'ip_address' => $ip,
                    'login_info' => "login success",
                    'admin_id' => $admin_id,
                ]
            );
            //����Cookieʱ�� 2Сʱ
            Cookie::set('admin_login',$res,60*60*2);
          /*  //����Sessionֵ
            Session::set('admin_id',['admin_id' => $res['admin_id']]);*/
        }
        return $res;
    }
    //��ȡ������Ϣ
    public function getAdminFind($arr = [])
    {
        $arr['where'] ='';
        $data = Db::name($this->table)->where($arr['where'])->find();
        return $data;
    }

    //��ȡ����Ա�б�
    public function getAdminList($arr = [])
    {
        $res = Db::name($this->table)->where($arr['where'])->order($arr['order'])->select();
        return $res;
    }
    //��ȡ��ҳ����
    public function getPageList($arr = [],$page)
    {
        $res = Db::name($this->table)->where($arr['where'])->order($arr['order'])->paginate($page);
        return $res;
    }

    //��ӹ���Ա��Ϣ
    public function addAdminInfo($data = [])
    {
        $res = Db::name($this->table)->insert($data);
        return $res;
    }
    //�޸Ĺ���Ա��Ϣ
    public function upAdmininfo($id,$data = [])
    {
        $res = Db::name($this->table)->where('admin_id',$id)->update($data);
        return $res;
    }
    //ɾ������Ա��Ϣ
    public function delAdmininfo($id)
    {
        $res = Db::name($this->table)->where('admin_id',$id)->delete();
        return $res;
    }
    //�ж��޸ĵ������Ƿ����
    public function isNameExists($name,$id)
    {
        $res = Db::name('admin')->where('admin_name',$name)->where($this->pk,'<>',$id)->find();
        return $res;
    }
}