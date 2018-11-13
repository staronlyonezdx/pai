<?php
/**
 * 公共Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 广州市素材火信息科技有限公司
 * 创建日期 2017-07-12
 * 版本 v.1.0.0
 * 网站：www.sucaihuo.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model;
use think\Db;
use think\Cache;
use think\Image;

class BaseModel extends \think\Model
{
    protected $prefix = '';
    protected $db = '';
    protected $pid = 0;//分类
    protected $pidEdit = 0;//修改后的分类
    protected $tbale = '';

    public function __construct()
    {
        header("Content-Type: text/html;charset=utf-8");
        //数据库
        $this->prefix = '' ;
        $this->prefix = \think\Config::get('database.prefix');
        $this->tbale = $this->prefix.$this->db;
        //dump($this);die;
        $this->pid = input('post.pid');	//获取分类pid
        $this->pidEdit = input('post.pid_edit');

    }

    /**
     * 查询列表
     * @param unknown $str
     * @param unknown $arr
     * @param unknown $field
     */
    public function getList($where, $order, $field, $cache)
    {
        $list = '';
        $cache = '';//暂时清除缓存
        $cache && $list = Cache::get($cache);
        //dump($cache);die;
        if(!$list)
        {
            $list = Db::table($this->tbale)->field($field)->where($where)->order($order)->select();
            Cache::set($cache,$list);
        }

        return $list;
    }

    public function getList2($table2,$where, $order, $field, $cache)
    {
        $list = '';
        $cache = '';//暂时清除缓存
        $cache && $list = Cache::get($cache);
        //dump($cache);die;
        $table=$this->prefix.$table2;
        if(!$list)
        {
            $list = Db::table($table)->field($field)->where($where)->order($order)->select();
            Cache::set($cache,$list);
        }

        return $list;
    }

    /**
     * 获取单条数据
     * @param unknown $where
     * @param unknown $field
     */
    public function getInfo($where, $field='*')
    {
        $info =  Db::table($this->tbale)->field($field)->where($where)->find();
        return $info;
    }

    /**
     * 获取单条数据
     * @param unknown $str
     * @param unknown $arr
     * @param unknown $field
     */
    public function getInfo2($table2,$where, $field='*')
    {
        $table=$this->prefix.$table2;
        $info =  Db::table($table)->field($field)->where($where)->find();
        return $info;
    }

    /**
     * 添加一条数据
     * 创建人 韦丽明
     * 时间 2017-07-12 11:31:32
     */
    public function getAdd($data, $cache=1)
    {
        if (!$data)
        {
            return false;
        }
        $add = Db::table($this->tbale)->data($data)->insert();
//		if($add)
//		{
//			//清除缓存
//			$this->getClearRm($cache);
//		}
        return $add;
    }
    /**
     * 添加一条数据
     */
    public function getAdd2($table2,$data, $cache=1)
    {
        if (!$data)
        {
            return false;
        }
        $table=$this->prefix.$table2;
        $add = Db::table($table)->data($data)->insert();
//		if($add)
//		{
//			//清除缓存
//			$this->getClearRm($cache);
//		}
        return $add;
    }

    /**
     * 添加多条数据
     * 创建人 韦丽明
     * 时间 2017-09-17 17:17:20
     */
    public function getAddAll($data, $cache)
    {
        if (!$data)
        {
            return false;
        }
        $add = Db::table($this->tbale)->insertAll($data);
        if($add)
        {
            //清除缓存
            $this->getClearRm($cache);
        }
        return $add;
    }

    /**
     * 插入返回id
     * 邓赛赛
     */
    public function insertId($data){
        if (!$data)
        {
            return false;
        }
        $id = Db::table($this->tbale)->insertGetId($data);
        return $id;
    }


    /**
     * 更新数据
     */
    public function getSave($where, $data, $cache='')
    {
        if (!$data || !$where)
        {
            return false;
        }
        $save = Db::table($this->tbale)->where($where)->update($data);
//		if($save)
//		{
//			//清除缓存
//			$this->getClearRm($cache);
//		}
        return $save;
    }

    public function getSave2($table2,$where, $data, $cache='')
    {
        if (!$data || !$where)
        {
            return false;
        }
        $table=$this->prefix.$table2;
        $save = Db::table($table)->where($where)->update($data);
//		if($save)
//		{
//			//清除缓存
//			$this->getClearRm($cache);
//		}
        return $save;
    }

    /**
     * 批量更新数据
     * 创建人 韦丽明
     * 时间 2017-07-12 11:36:14
     */
    public function getSaveAll($data, $cache)
    {
        if (!$data)
        {
            return false;
        }
        $saveAll = Db::table($this->tbale)->saveAll($data);
        if($saveAll)
        {
            //清除缓存
            $this->getClearRm($cache);
        }
        return $saveAll;
    }


    /**
     * 删除一条数据
     * 创建人 韦丽明
     * 时间 2017-07-12 11:40:46
     */
    public function getDel($where, $cache)
    {
        if (!$where)
        {
            return false;
        }
        $del = Db::table($this->tbale)->where($where)->delete();
        if($del)
        {
            //清除缓存
            $this->getClearRm($cache);
        }
        return $del;
    }

    /**
     * 删除多条数据
     * 创建人 韦丽明
     * 时间 2017-09-17 17:26:40
     */
    public function getDelMost($id_arr, $cache)
    {
        if (!$id_arr)
        {
            return false;
        }
        $allDel = Db::table($this->tbale)->delete($id_arr);
        if($allDel)
        {
            //清除缓存
            $this->getClearRm($cache);
        }
        return $allDel;
    }

    /**
     * 自增数据
     * 创建人 韦丽明
     * 时间 2017-07-12 11:53:45
     */
    public function getSetInc($where, $field, $data, $cache)
    {
        if (!$where || !$field || $data<1)
        {
            return false;
        }
        $Inc = Db::table($this->tbale)->where($where)->setInc($field, $data);
        if($Inc)
        {
            //清除缓存
            $this->getClearRm($cache);
        }
        return $Inc;
    }

    /**
     * 自减数据
     * 创建人 韦丽明
     * 时间 2017-07-12 11:54:40
     */
    public function getSetDec($where, $field, $data, $cache)
    {
        if (!$where || !$field || $data<1)
        {
            return false;
        }
        $Dec = Db::table($this->tbale)->where($where)->setDec($field, $data);
        if($Dec)
        {
            //清除缓存
            $this->getClearRm($cache);
        }
        return $Dec;
    }

    /**
     * 更新某个字段的值
     * 创建人 韦丽明
     * 时间 2017-07-12 11:57:05
     */
    public function getSetField($where, $field, $data, $cache)
    {
        if(is_array($field))
        {
            if (!$where || !$field)
            {
                return false;
            }
            $update = Db::table($this->tbale)->where($where)->setField($field);
        }
        else
        {
            if (!$where || !$field || !$data)
            {
                return false;
            }
            $update = Db::table($this->tbale)->where($where)->setField($field, $data);
        }

        if($update)
        {
            //清除缓存
            $this->getClearRm($cache);
        }

        return $update;
    }

    /**
     * 统计数量
     * 创建人 韦丽明
     * 时间 2017-07-25 16:19:04
     */
    public function getCount($where)
    {
        if (!$where)
        {
            return false;
        }
        $count =  Db::table($this->tbale)->where($where)->count();
        return $count;
    }

    /**
     * 查询某一列的值
     * 创建人 韦丽明
     * 时间 2017-09-06 22:28:13
     */
    public function getColumn($where, $field)
    {
        if (!$where || !$field)
        {
            return false;
        }
        $count =  Db::table($this->tbale)->where($where)->column($field);
        return $count;
    }

    /**
     * 分页查询
     * 创建人 韦丽明
     * 时间 2017-09-06 22:40:02
     */
    public function getPageList($where, $field, $order, $page, $cache)
    {
        if (!$where)
        {
            //return false;
        }

        $list = '';
        //必须要有缓存 查询时不缓存
        if($cache)
        {
            //判断当前页数
            $getPage = Cache::get($cache.'page');
            //总页数
            $pageName = $cache.'A';
            $lastPage = Cache::get($pageName);

            if(empty(input('get.page')))
            {
                $getPage = 1;
            }
            if($lastPage>=input('get.page') && input('get.page'))
            {
                $getPage = input('get.page');
            }

            if($lastPage===1 && empty($getPage))
            {
                $getPage = 1;
            }
            //dump($getPage);
            if(empty(input('get.page')) && intval($lastPage)===intval($getPage))
            {
                $getPage = 1;
            }

            //每一页都进行缓存 缓存名$cache2 列如“goods_1”
            $cache2 = $cache.'_'.$getPage;
            $list = Cache::get($cache2);

        }

        if(!$list)
        {
            $list = Db::table($this->tbale)->field($field)->where($where)->order($order)->paginate($page);
            //必须要有缓存 查询时不缓存
            if($cache)
            {
                $page = $list->toArray();

                if($page['data']){

                    //当前页数缓存
                    Cache::set($cache.'page',$getPage);
                    //总页数保持缓存 判断一共多少页？列如“goodsA”
                    Cache::set($pageName,$page['last_page']);
                    Cache::set($cache2,$list);
                }
            }
        }

        return $list;
    }

    /**
     * 清除分页缓存
     * 创建人 韦丽明
     * 时间 2017-09-06 22:28:13
     */
    public function getClearRm($cache)
    {
        $classD = '' ;
        //分类
        if($this->pid)
        {
            $classD = (int)$this->pid;
        }

        $this->getClearCahce($classD,  $cache);
        //修改后的分类
        if($this->pidEdit)
        {
            $classD = $this->pidEdit;
        }
        $this->getClearCahce($classD,  $cache);
    }

    /**
     * 批量删除时清除缓存
     * 创建人 韦丽明
     * 时间 2017-09-06 22:28:13
     */
    public function getClearAllPid($pid, $cache)
    {
        $classD = '';
        //分类
        if($pid)
        {
            $classD = $pid;
        }
        $this->getClearCahce($classD,  $cache);
    }

    /**
     * 清除缓存
     * 页数不超过50情况下
     * 创建人 韦丽明
     * 时间 2017-09-06 22:28:13
     */
    public function getClearCahce($classD,  $cache)
    {
        //后台分页缓存 列如“goodsA”获得总页数
        $pageA = $cache.'A';
        $pageListA = (int)Cache::get($pageA);

        //前台分页缓存 列如“goodsBA”获得总页数
        $pageB = $cache.'BA';
        $pageListB = (int)Cache::get($pageB);

        //前台分类缓存 列如“goodsCA”获得总页数
        $pageC = $classD.$cache.'CA';
        $pageListC = (int)Cache::get($pageC);

        if($pageListA>50 || $pageListB>50 || $pageListC>50)
        {
            //清除所有缓存
            Cache::clear();
        }
        else
        {
            if($pageListA)
            {
                for($i=1; $i<=$pageListA; $i++)
                {
                    //列如“1goods_1”分类缓存加分页
                    $rmchage = $classD.$cache.'_'.$i;
                    //列如“goods_1”缓存加分页
                    $rmchage_2 = $cache.'_'.$i;
                    Cache::rm($rmchage);
                    Cache::rm($rmchage_2);
                }
            }

            if($pageListB)
            {
                for($i=1; $i<=$pageListB; $i++)
                {
                    //列如“1goodsB_1”分类缓存加分页
                    $rmchage = $classD.$cache.'B_'.$i;
                    //列如“goodsB_1”缓存加分页
                    $rmchage_2 = $cache.'B_'.$i;
                    Cache::rm($rmchage);
                    Cache::rm($rmchage_2);
                }
            }

            if($pageListC)
            {
                for($i=1; $i<=$pageListC; $i++)
                {
                    //列如“1goodsC_1”分类缓存加分页
                    $rmchage = $classD.$cache.'C_'.$i;
                    //列如“goodsC_1”缓存加分页
                    $rmchage_2 = $cache.'C_'.$i;
                    Cache::rm($rmchage);
                    Cache::rm($rmchage_2);
                }
            }
        }
        Cache::rm($cache);
        //分类数量
        Cache::rm($cache.'p');
    }

    /**
     * 分页查询
     * 创建人 刘勇豪
     * 时间 2018-06-27 18:00:00
     */
    public function getPaginate($where, $field, $order, $page, $cache)
    {
        $list = Db::table($this->tbale)
            ->field($field)
            ->where($where)
            ->order($order)
            ->paginate($page,false,['query'=>request()->param() ]);
        return $list;
    }

    /**
     * 通过ip获取地理位置
     * @param string $ip
     * @return array|bool|mixed
     * 邓赛赛
     */
    function getCity($ip = '')
    {
        if($ip == ''){
            return false;
//            $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
//            $ip=json_decode(file_get_contents($url),true);
//            $data = $ip;
        }else{
            $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
            $ip=json_decode(file_get_contents($url));
            if((string)$ip->code=='1'){
                return false;
            }
            $data = (array)$ip->data;
        }

        return $data;
    }

    /**
     * 保存ba64文件
     * 邓赛赛
     */
    public function ba64_img($img=[],$name,$width=300, $height=300){

        if(!$img){
            return false;
        }
        $imgs = [];
        $date = date("Ymd",time());
        $url = "uploads/".$name."/".$date;

        if(!is_dir($url)){
            $root_path = "uploads/".$name;
            if(!is_dir($root_path)){
                mkdir($root_path);
                chmod($root_path,0777);
            }
            mkdir($url);
            chmod($url,0777);
        }

        $thumbUrl = 's_uploads/'.$name.'/'.$date;
        if(!is_dir($thumbUrl)){
            if(!is_dir('s_uploads/'.$name)){
                mkdir('s_uploads/'.$name);
                chmod($url,0777);
            }
            mkdir($thumbUrl);
            chmod($thumbUrl,0777);
        }

        $img = array_filter($img);
        foreach($img as $k => $v){
            $base64_string= explode(',', $v);
            if(empty($base64_string[1])){
                continue;
            }
            $file= base64_decode($base64_string[1]);
            $shopUrl= $url."/".time().rand(1000,9999).rand(1000,9999).$k.".jpg";
            $is_success = file_put_contents($shopUrl,$file);
//            return $is_success;
            if($is_success){
                $imgs [] = "/".$shopUrl;
//                $image = Image::open($shopUrl);
//                $image->thumb($width, $height)->save(str_replace("uploads/","s_uploads/",$shopUrl),'jpg','90');
            }
        }
        return $imgs;
    }

    /**
     * 压缩图片
     * 邓赛赛
     */
    public function compress_img($path){
        $image = Image::open($path);
        $image->thumb(150, 150)->save('./thumb.png');
    }
    /**
     * limit查询操作
     * 邓赛赛
     */
    public function get_limit_list($where,$order,$field,$offset,$page_size,$cache=''){
        if(!$page_size){
            return false;
        }
        $limit = Db::table($this->tbale)
            ->where($where)
            ->field($field)
            ->order($order)
            ->limit($offset,$page_size)
            ->select();
        return $limit;
    }

    /**
     * limit消息查询操作
     * 邓赛赛
     */
    public function get_msg_list($where,$order,$field,$offset,$page_size){
        if(!$page_size){
            return false;
        }
        $limit = Db::table($this->tbale)
            ->where($where)
            ->whereOr(['sm_public'=>2])
            ->field($field)
            ->order($order)
            ->limit($offset,$page_size)
            ->select();
        return $limit;
    }

    /**
     * 单独取出某列的某个字段
     * 邓赛赛
     */
    public function get_value($where,$field){
        $name = Db::table($this->tbale)->where($where)->value($field);
        return $name;
    }
    /**
     * 统计数量
     * 邓赛赛
     */
    public function get_count_num($where){
        if(!$where){
            return false;
        }
        $num = Db::table($this->tbale)
            ->where($where)
            ->count();
        return $num;
    }

    /**
     * 分组分页查询
     * 创建人 邓赛赛
     * 时间 2018-06-27 18:00:00
     */
    public function getGroupPaginate($where, $field, $order, $offset,$page_size, $group,$cache)
    {
        $list = Db::table($this->tbale)
            ->field($field)
            ->order($order)
            ->where($where)
            ->limit($offset,$page_size)
            ->group($group)
            ->select();
        return $list;
    }

}