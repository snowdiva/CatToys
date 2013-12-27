<?php
    // 类名必须和控制器前缀-news-完全一样，并且大小写严格
    class NewsControl extends Control{
        function show(){
            $db = M("news");
            //分页
            //查询总条数
            $count = $db->count();
            //分页对象
            $page = new Page($count,2);
            $this->assign("page",$page->show());
            $data = $db->where($page->limit())->all();
            $this->assign("news",$data);
            $this->display();
        }
        // 插入数据
        function add(){           
        //判断POST信息是否为空
                if(IS_POST){
                    $db = M("news");
                    if($db->add()){
                        $this->success("发表成功",'show');  //调用HDPHP框架的成功提示
                    }else{
                        $this->error("发表失败",'show');    //调用HDPHP框架的失败提示
                    }
                }else{
                // HDPHP框架自动调用输入界面
                    $this->display();
            }
        }
    }