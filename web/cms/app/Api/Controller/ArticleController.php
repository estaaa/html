<?php namespace Api\Controller; 
use Api\Controller;
class ArticleController extends Controller{
    
    //构造函数
    public function __init()
    {
    }

    //GET /photo 索引
    public function index()
    {
        //起始条
        $begin= Q('get.begin',0);
        //总条数
        $row = Q('get.row',10);
        $db = Db::table('article');
        $data = $db->limit($begin,$row)->get();
		
        $this->returnAjax(0,$data);
    }

   

    //POST /photo 保存新增数据
    public function store()
    {
        echo 'store';
    }


    //GET /photo/{photo}/edit 更新界面
    public function edit($id)
    {
        echo 'edit';
    }

    //PUT /photo/{photo} 更新数据
    public function update($id)
    {
        echo 'update';
    }

    //DELETE /photo/{photo} 删除
    public function destroy($id)
    {
        echo 'destroy';
    }
}