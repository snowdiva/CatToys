<?php
    class NewsControl extends Control{
        //模型对象
        private $_db;
        public function __init(){
            //K的作用是实例化一个news模型
            //K与M的区别是，M只能调用框架自有模型，而K可以自定义
            $this->_db = K('news');

        }
        //显示文章内容
        function content(){
            //intval函数是强制转换成数字伪类型
            $id = Q("get.id",NULL,'intval');
            if($id){
                $field = $this->_db->find($id);
                //p === print_r()
                // p($field);
                $this->assign("field",$field);
                $this->display();
            }
        }
    }