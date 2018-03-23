<?php
/**
* 品牌模型
*/
namespace Common\Model;
use Think\Model;
class BrandModel extends model{
   

    protected $_validate = array(
        array('title','require','logo名称不能为空',1,3),
        );



    public function brandAdd(){
        if(!$this->create()) return false;
        // p($_POST);die;
        $title = I('post.title',0,'string');
        // 判断logo 名字是否有相同的
        $allData = $this->where("title='{$title}'")->select();
        // var_dump($allData);die;
        if($allData){$this->error="品牌名称已经存在";return false;}
        if($_FILES){
            if($_FILES['logo']['error']!=4){
                $upload = new \Think\Upload(array('rootPath'=>'./Uploads/Brank'));
                // 执行上传
                $files = $upload->upload();
                // 如果有错误 返回错误
                if(!$files){
                    $this->error=$upload->getError();
                    return false;
                }
                // 组合图片路径
            $_POST['logo']='Brank'.$files['logo']['savepath'].$files['logo']['savename'];

           }
        }
        $this->add($_POST);
        

        $this->add();
        return true;
    }


    /**
     * 编辑
     * @param  [type] $bid [description]
     * @return [type]      [description]
     */
    public function edit($bid){
        if(!$this->create()) return false;
        if($_FILES){
            
            if($_FILES['logo']['error']!=4){
                $upload = new \Think\Upload(array('rootPath'=>'./Uploads/Brank'));
                // 执行上传
                $files = $upload->upload();
               // 如果有错误 返回错误
                if(!$files){
                    $this->error=$upload->getError();
                    return false;
                }
                // 组合图片路径
                $_POST['logo']='Brank'.$files['logo']['savepath'].$files['logo']['savename'];

            }
        }
        $this->where("bid={$bid}")->save($_POST);
       
        return true;
    }

}