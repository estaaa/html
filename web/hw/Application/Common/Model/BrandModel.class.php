<?php
/**
* 品牌模型
*/
class BrandModel extends Model
{
    
    public $table='brand';

    public $validate = array(
        array('title','nonull','logo名称不能为空',2,3),
        );



    public function brandAdd(){
        if(!$this->create()) return false;
        // p($_POST);die;
        $title = Q('post.title',0,'string');
        // 判断logo 名字是否有相同的
        $allData = $this->where("title='{$title}'")->all();
        // var_dump($allData);die;
        if($allData){
            $this->error="品牌名称已经存在";
            return false;
        }
        // 判断是否有上传
        if($_FILES){
            // 如果用户上传了 就判断是否有错误
            if($_FILES['logo']['error']!=4){
                $upload= new Upload($path='upload/Brand');
                $uplofiles = $upload->upload();
                if(!$uplofiles){
                    $this->error=$upload->error;
                    return false;
                }
                $_POST['logo'] = $uplofiles[0]['path'];
            }
        }
        

        $this->add();
        return true;
    }



    public function edit($bid){
        if(!$this->create()) return false;
        if($_FILES){
            if($_FILES['logo']['error']!=4){
                $upload = new Upload($path='Upload/Brand/');
                $files = $upload->upload();
                if(!$files){
                    $this->error=$upload->error;
                    return false;
                }
                $this->data['logo']=$files[0]['path'];

            }
        }
        $this->where("bid={$bid}")->update();
        return true;
    }
}