<?php
/**
* 备份数据
*/
class BackupController extends Controller
{
    
    public function index(){
        $dirArr = Dir::tree('Backup');
        // p($dirArr);
        $this->assign('dirArr',$dirArr);
        $this->display();
    }
    /**
     * 数据备份
     */
    public function add(){
        $result = Backup::backup(
                            array(
                                'size'=>200,
                                'dir'=>'Backup/'.date('ymdHis'),
                                'step_time'=>1
                                )
                            );
        if($result===false){
            $this->error(Backup::$error,U('Index/index'));
        }else{
            if($result['status']=='success'){
                $this->success('备份成功',U('index'));

            }else{
                $this->success($result['message'],$result['url'],0.2);
            }
        }
        // p($result);
    }

    public function recovery(){
        if(!isset($_SESSION['dir'])){
            $_SESSION['dir'] = Q('post.dir');
        }
        $result = Backup::recovery(array('dir'=>$_SESSION['dir']));
        if($result===false){
            $this->error(Backup::$error,U('index'));
        }else{
            if($result['status']=='success'){
                unset($_SESSION['dir']);
                $this->success($result['message'],U('index'));
            }else{
                $this->success($result['message'],$result['url'],0.2);
            }
        }
        $this->display();
    }
}