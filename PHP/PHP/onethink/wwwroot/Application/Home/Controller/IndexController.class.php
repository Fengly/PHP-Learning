<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;
use User\Api\UserApi;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {


	//系统首页
    public function index($id=null){
        define('UID',$_SESSION['onethink_home']['user_auth']['uid']);
        if(empty(UID))
            return $this->redirect('User/login');
        $User = new UserApi();
        $nickname=$User->info(UID);
        $this->assign('user',$nickname[1]);
        $this->display();
    }
    public function huanying(){
        return $this->display();
    }

    public function update(){

        $data['nickname'] = $_REQUEST['nickname'];
        $time = date('Y-m-d',strtotime($_REQUEST['birthday']));
        $data['birthday'] = $time;
        $data['qq'] = $_REQUEST['qq'];
        $id= $_REQUEST['id'];
        $where['uid']=$id;
        $list= M('member')->where($where)->save($data);
        if($list){
            $src['mobile'] = $_REQUEST['mobile'];
            $src['email'] = $_REQUEST['email'];
            $src['update_time'] = time();
            $uid=M('ucenter_member')->where(['id'=>$id])->save($src);
            if($uid){
                return $this->ajaxReturn(1,'JSON');
            }
            return $this->ajaxReturn('网络错误','JSON');
        }
        return $this->ajaxReturn('404网络错误','JSON');




    }
    public function userList(){

       return $this->display();
    }
    public function userAddr(){

        return $this->display();
    }

    public function user(){
        $User = M('member');
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $id=I('post.uid');
        $nickname=I('post.nickname');
        $upTime=I('post.uptime');
        $reupTime = I('post.reuptime');
        $date = '';
       /* if(!empty($upTime) && !empty($reupTime)){
            $date='and update_time between '.strtotime($upTime) .' and '.strtotime($reupTime);
        }
        if(!empty($upTime) && empty($reupTime)){
            $date = 'and update_time <= '.strtotime($reupTime);
        }
        if(empty($upTime) && !empty($reupTime)){
            $date = 'and update_time >= '.strtotime($upTime);
        }*/
        if(!empty($id)) {
            $where['uid'] = $id;
        }
        if(!empty($nickname)){
            $where['nickname']=array('like','%'.$nickname.'%');
        }
        $count=$User
            ->join('xu_ucenter_member on xu_ucenter_member.id =uid '.$date)
            ->where($where)
            ->count('uid');
        $list =$User
            ->join('xu_ucenter_member on xu_ucenter_member.id =uid')
            ->where($where)
            ->order('score desc,update_time desc')
            ->limit($rows)
            ->page($page)
            ->select();
        foreach($list as $key => $val){
            $list[$key]['time']=date('Y-m-d H:i',$val['update_time']);
            $list[$key]['type']=$val['status'] == 1 ?'正常':'禁用';
        }
        $result['total']=$count;
        $result['rows']=$list;

        return  $this->ajaxReturn($result,'JSON');

    }
    public function delete($id){
        $data['id'] = $id;
        $where['uid']= $id;

        M('member')->where($where)->delete();
        M('ucenter_member')->where($data)->delete();
        return  $this->ajaxReturn(['success'=>true],'JSON');
    }

}