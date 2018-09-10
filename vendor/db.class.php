<?php

class db{

    private static $link,$result;

    /**
     * @desc 连接数据库
     * db constructor.
     * @param $config
     */
    public function __construct($config)
    {
        //链接数据库
        self::$link = mysqli_connect(
            $config['dsn'],$config['username'],$config['password'],$config['dbname']
        );
    }

    /**
     * @desc 执行链接数据库
     * @param $sql
     * @return $this
     */
    public function query($sql){
        self::$result =  mysqli_query(self::$link,$sql);
        return $this;
    }

    /**
     * @desc 将执行出来的对象转为数组
     * @param $sql
     * @return array|null
     */
    public function fetchAll(){
        return mysqli_fetch_all(self::$result,MYSQLI_ASSOC);
    }


    /**
     * @desc 添加的方法
     * @param $tableName     数据表名
     * @param array $array  要添加的数据
     */
    public function add($tableName,$array=[]){
        $v ='';
        foreach ($array as $key=>$value){
            is_string($value)?$value =  "'".$value."'":'';
            if (empty($value)) $v.='null';
            $v.=$value.',';
        }
        $v = rtrim($v,',');
        $sql = 'insert into '.$tableName.' values('.$v.')';
        echo $sql;
        $this->query($sql);
    }


    /**
     * @desc 修改的方法
     * @param $tableName
     * @param array $array
     * @param string $condition
     */
    public function update($tableName,$array=[],$condition=''){
        $v = '';
        foreach ($array as $key=>$value) {
            is_string($value)?$value =  "'".$value."'":'';
            if (empty($value)) $v.='null';
            $v.= $key .'='.$value;
        }

        $sql = 'update '.$tableName.' set '.$v.'  where  '.$condition;
        echo $sql;
        $this->query($sql);

    }

    /**
     * @desc 删除的方法
     * @param $tableName
     * @param string $condition
     */
    public function del($tableName,$condition=''){
        $sql = 'delete from '.$tableName.' where '.$condition;
        $this->query($sql);
    }



}