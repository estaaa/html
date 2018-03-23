<?php 
class Model{
	//保存mysql连接对象
	private static $link=NULL;
	//保存表名
	private $table;
	//保存表的结构信息
	private $opt;
	/**
	 * 构造方法，自动执行
	 */
	public function __construct($table){
		if(is_null(self::$link)){
			$link = @new Mysqli(C('DB_HOST'),C('DB_USER'),C('DB_PASSWORD'),C('DB_NAME'));
			//如果有连接错误，则提示错误
			if($link->connect_errno) die($link->connect_error);
			$sql = "SET NAMES " . C('DB_CHARSET');
			//设置字符集
			$link->query($sql);
			//把对象保存到属性中
			self::$link = $link;
			$this->error($sql);
		}
		//把表名保存到属性中
		$this->table = $table;
		//初始化表的结构
		$this->opt();
	}

	private function opt(){
		$this->opt = array(
			'where' => '',
			'field' => '*',
			'order' => '',
			'limit' => '',
			'group' => '',
			'having'=> ''
			);
	}
	/**
	 * 做查询，它不是mysqli的query
	 * 执行有结果集的操作
	 */
	public function query($sql){
		//调用mysqli里面的query
		$result = self::$link->query($sql);
		//判断sql语句是否有问题
		$this->error($sql);
		$rows = array();
		//获得每一条记录，压入到rows里面去
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		//释放结果集
		$result->free();
		//返回结果
		return $rows;
	}
	
	/**
	 * 删除
	 */
	public function delete(){
		//如果没有传递where条件
		if(!$this->opt['where']){
			halt('请必须传递WHERE条件才可以删除');
		}
		$sql = "DELETE FROM " . $this->table . $this->opt['where'];
		$this->exec($sql);
	}
	
	/**
	 * 修改
	 */
	public function update($data=NULL){
		//如果没有传递where条件
		if(!$this->opt['where']){
			halt('请必须传递WHERE条件才可以修改');
		}
		//如果用户没有传递参数，走$_POST
		if(is_null($data)) $data = $_POST;
		$info = '';
		foreach ($data as $field => $value) {
			$info .= $field . '="' . $value . '",';
		}
		$info = rtrim($info,',');
//		"UPDATE student SET username='小小绿',sid=6 WHERE sid=6";
		$sql = "UPDATE " . $this->table . " SET {$info}" . $this->opt['where'];
		$this->exec($sql);
	}
	/**
	 * 插入数据
	 */
	public function add($data=NULL){
		//如果用户没有传递参数，走$_POST
		if(is_null($data)) $data = $_POST;
		//组合字段名
		$fields = implode(',',array_keys($data));
		//组合字段值
		$values = '"' . implode('","',array_values($data)) . '"';
		$sql = "INSERT INTO " . $this->table . "({$fields}) VALUES ({$values})";
		
		$this->exec($sql);
	}
	
	/**
	 * 执行无结果集操作
	 */
	public function exec($sql){
		self::$link->query($sql);
		$this->error($sql);
	}

	/**
	 * [all 获得所有信息]
	 * @return [array] [结果集]
	 */
	public function all(){
		//1.select 
		//2.where
		//3.group
		//4.order
		//5.having
		//6.limit
		//正确顺序：1,2,3,5,4,6
		//"SELECT * FROM user WHERE 1=1 GROUP BY uid HAVING uid=1 ORDER BY uid DESC LIMIT 1;";
		
		$sql = "SELECT " . $this->opt['field'] . " FROM " . $this->table . $this->opt['where'] . $this->opt['group'] . $this->opt['having'] . $this->opt['order'] . $this->opt['limit'];
		return $this->query($sql);
	}
	  
	public function limit($limit){
		$this->opt['limit'] = " LIMIT {$limit}";
		return $this;
	}
	
	/**
	 * 排序
	 */
	public function order($order){
		$this->opt['order'] = " ORDER BY {$order}";
		return $this;
	}
	/**
	 * 设置字段
	 */
	public function field($field){
		$this->opt['field'] = $field;
		return $this;
	}

	/**
	 * [where where条件方法]
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	public function where($where){
		$this->opt['where'] = " WHERE {$where}";
		//返回当前对象
		return $this;
	}

	/**
	 * [find 获得一条信息]
	 * @return [type] [description]
	 */
	public function find(){
		$data = $this->all();
		//返回当前单元,一维数组
		return current($data);
	}

	/**
	 * [error 错误处理]
	 * @return [type] [description]
	 */
	private function error($sql){
		//判断sql语句是否有问题
		if(self::$link->errno){
			halt("sql错误：" . self::$link->error . '<br/>' . "<h2 style='color:red'>有问题的sql：  {$sql}</h2>");
			
		}
	}
	
}







 ?>