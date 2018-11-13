<?php
namespace app\data\service\api;
use app\data\model\api\ApiModel  as ApiModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;
use think\Request;
use think\image;


class ApigoodsService extends BaseService
{
	protected $cache = 'api';
	public function __construct()
	{
		parent::__construct();
		$this->api = new ApiModel();
		$this->cache = 'api';
		
	}
    //读取商品成交总单数
    public function get_goods_ordernum($gp_id,$o_state="1"){
            $table="order_pai";
            $sql="select count(o_id) as n from pai_order_pai where o_state=$o_state and gp_id=$gp_id group by gp_id ";
            $list=Db::table($table)->query($sql);
            $n=0;
           if(!empty($list[0]['n'])){
               $n=$list[0]['n'];
           }
            return $n;
    }
    //根据省市区ID得到省市区名称
    public function getAddressNameById($id){
        $table="region";
        $sql="select count(region_name) as name from $table where region_id=$id";
        $list=Db::table($table)->query($sql);
        $name="未知";
        if(!empty($list[0]['name'])){
            $name=$list[0]['name'];
        }
        return $name;
    }
    //得到折扣列表
    public function getZKPai($id){
        $rlist=array();
        $table="pai_order_pai";
        $sql1="select op.gdr_id,gdr.gdr_membernum,gdt.gdt_img,gdr.gdr_price,gdt_name from pai_order_pai op left join pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id left join pai_goods_discounttype gdt ON gdt.gdt_id=gdr.gdt_id where op.o_state=0 and op.gp_id=$id GROUP by op.gdr_id ORDER by gdt.gdt_id desc";
        $list1=Db::table($table)->query($sql1);
        if(!empty($list1))
        {
            foreach($list1 as $k=>$v){
                $zk_joinnum=0;
                if(!empty($v['gdr_id'])) {
                    $rlist[$k]['zk_name'] = $v['gdt_name'];
                    $rlist[$k]['zk_img'] = $this->cdn_url . $v['gdt_img'];
                    $rlist[$k]['zk_price'] = $v['gdr_price'];
                    $sql = "select m.m_avatar,m.m_name from pai_order_pai op left JOIN  pai_member m ON op.m_id=m.m_id where op.o_state=0 and op.gp_id=$id and op.gdr_id=".$v['gdr_id'];
                    $list = Db::table($table)->query($sql);
                    foreach($list as $k1=>$v1){
                        $list[$k1]['m_avatar']=$this->cdn_url.$v1['m_avatar'];
                    }
                    $zk_joinnum=count($list);
                    $rlist[$k]['zk_joinnum']=$zk_joinnum;
                    $rlist[$k]['zk_person']=$list;
                }
            }
        }
        return $rlist;
    }
    //得到折扣列表
    public function getZKPai2($id){
        $rlist=array();
        $table="pai_order_pai";
        $sql1="select gdr.gdr_id,gdr.gdr_membernum,gdr.gdr_price,gdt.gdt_img,gdt.gdt_name from pai_goods_dt_record gdr left join pai_goods_discounttype gdt ON gdr.gdt_id=gdt.gdt_id  where g_id=$id";
        $list1=Db::table($table)->query($sql1);
        if(!empty($list1))
        {
            $rlist=array();
            foreach($list1 as $k=>$v){
                $sql2="select sum(op.gp_num) as jcnum from pai_order_pai op WHERE op.o_state=1 and op.o_paystate=2 and op.gdr_id=".$v['gdr_id'];
                $list2=Db::table($table)->query($sql2);
                if(!empty($list2[0]['jcnum'])){
                    $rlist[$k]['jcnum']=$list2[0]['jcnum'];
                }
                else{
                    $rlist[$k]['jcnum']=0;
                }
                if(!empty($v['gdr_id'])) {
                    $rlist[$k]['gdr_id'] = $v['gdr_id'];
                    $rlist[$k]['gdt_name'] = $v['gdt_name'];
                    $rlist[$k]['membernum'] = $v['gdr_membernum'];
                    $rlist[$k]['zk_img'] = $this->cdn_url . $v['gdt_img'];
                    $rlist[$k]['zk_price'] = $v['gdr_price'];
                    $sql = "select m.m_avatar,m.m_name,op.o_addtime from pai_order_pai op left JOIN  pai_member m ON op.m_id=m.m_id where op.o_state=1 and op.o_paystate=2 and op.gdr_id=".$v['gdr_id'];
                    $list = Db::table($table)->query($sql);
                    foreach($list as $k1=>$v1){
                        $list[$k1]['m_avatar']=$this->cdn_url.$v1['m_avatar'];
                    }
                    $zk_joinnum=count($list);
                    $rlist[$k]['zk_joinnum']=$zk_joinnum;
                    $rlist[$k]['zk_person']=$list;
                }
            }
        }
        return $rlist;
    }
    //读取商品详情
    public function get_goods_info($g_id){
        $table="order_pai";
        $sql="select g.g_id,g.g_name,g_secondname,g_express,g.g_description,g.g_endtime,g.pid,g.cid,g.aid,g.g_storeid,g.g_typeid,g.g_state,g.g_limited,g.gc_id,g.g_score,gp.gp_id,gp.gp_market_price,gp.gp_stock from pai_goods g left join pai_goods_product gp on g.g_id=gp.g_id where g.g_id=$g_id order by g.g_id ";
        $list=Db::table($table)->query($sql);
        $info=array();
        if(!empty($list[0])){
            $info=$list[0];
        }
        else{
            return $info;
        }
        $sql1="select gi.gi_name from pai_goods_imgs gi where g_id=$g_id order by gi_sort asc ";
        $list1=Db::table($table)->query($sql1);
        $g_imgs=array();
        foreach($list1 as $k=>$v){
            $g_imgs[$k]['g_img']=$this->cdn_url.$v['gi_name'];
        }
        $info['imgs']=$g_imgs;

        $sql2="SELECT MAX(gdr_price) max_price,MIN(gdr_price) min_price FROM pai_goods_dt_record WHERE g_id=".$g_id;
        $gprice=Db::table($table)->query($sql2);
        if(!empty($gprice[0]['max_price'])){
            $info['max_price']= $gprice[0]['max_price'];
            $info['min_price']= $gprice[0]['min_price'];
        }
        else{
            $info['max_price']=$info['gp_market_price'];
            $info['min_price']=$info['gp_market_price'];
        }
        return $info;
    }
    //读取店铺评价
    public function get_goods_review($gp_id,$store_id){
        $table="order_pai";
        //店铺评价
        $sql="select s.s_score,s.e_score,g_score from pai_store s  where s.store_id=$store_id ";
        $list=Db::table($table)->query($sql);
        $info=array();
        if(!empty($list[0])){
            $info['store_review']=$list[0];
        }
        //商品评价
        $sql2="select rg.rg_id,rg.goods_score,rg.add_time,rg.rg_content,rg.rg_showname,m.m_name,m.m_avatar,g.g_score from pai_review_goods rg LEFT JOIN pai.pai_goods_product gp ON rg.gp_id=gp.gp_id LEFT JOIN
 pai.pai_goods g ON gp.g_id=g.g_id LEFT JOIN pai_review_order ro ON rg.ro_id=ro.ro_id LEFT JOIN  pai_member m ON ro.m_id=m.m_id where rg.gp_id=$gp_id ";
        $list2=array();
        $list2=Db::table($table)->query($sql2);
        if(!empty($list2)){
            foreach($list2 as $k=>$v){
                $list2[$k]['m_avatar']=$this->cdn_url.$v['m_avatar'];
                $sql3="select rgi.img_url  from pai_review_goods_imgs rgi  where rgi.rg_id=".$v['rg_id'];
                $list3=Db::table($table)->query($sql3);
                foreach($list3 as $k3=>$v3){
                    $list3[$k3]['img_url']=$this->cdn_url.$v3['img_url'];
                }
                $list2[$k]['rg_imgs']=$list3;
            }
        }
        $info['goods_review']=$list2;
        return $info;
    }
    //读取推荐商品
    public function get_pinfo_tjproducts($store_id,$categroy_id){
        $table="order_pai";
        $tj_products=array();
        $list=array();
        $list2=array();
        $list3=array();
        //自己店铺商品
        $sql="select g.g_id,g.g_name,gp.gp_market_price,g.g_img,MIN(gdr.gdr_price) price2,sum(op.gp_num) num2 from pai_goods g LEFT JOIN pai_goods_dt_record gdr ON g.g_id=gdr.g_id LEFT join pai_goods_product gp on g.g_id=gp.g_id LEFT JOIN
pai_order_pai op ON gp.gp_id=op.gp_id where g_storeid=$store_id and gc_id=$categroy_id GROUP by gdr.g_id limit 6 ";
        $list=Db::table($table)->query($sql);
        $pcount1=count($list);
        if($pcount1<6){
            $limit2=6-$pcount1;
            $sql2="select g.g_id,g.g_name,gp.gp_market_price,g.g_img,MIN(gdr.gdr_price) price2,sum(op.gp_num) num2 from pai_goods g  LEFT JOIN pai_goods_dt_record gdr ON g.g_id=gdr.g_id LEFT join pai_goods_product gp on g.g_id=gp.g_id LEFT JOIN
pai_order_pai op ON gp.gp_id=op.g_id   where g_storeid=$store_id GROUP by gdr.g_id  limit ".$limit2;
            $list2=Db::table($table)->query($sql2);
            $pcount2=count($list2);
            $pcountall=$pcount1+$pcount2;
            if($pcountall<6){
                $limit3=6-$pcountall;
                $sql3="select g.g_id,g.g_name,gp.gp_market_price,g.g_img,MIN(gdr.gdr_price) price2,sum(op.gp_num) num2 from pai_goods g  LEFT JOIN pai_goods_dt_record gdr ON g.g_id=gdr.g_id LEFT join pai_goods_product gp on g.g_id=gp.g_id  LEFT JOIN
pai_order_pai op ON gp.gp_id=op.gp_id    where g_storeid=$store_id and gc_id=$categroy_id GROUP by gdr.g_id  limit ".$limit3;
                $list3=Db::table($table)->query($sql3);
            }
        }
        $tj_products=array_merge($list,$list2,$list3);
        foreach($tj_products as $k3=>$v3){
            $tj_products[$k3]['g_img']=$this->cdn_url.$v3['g_img'];
        }
        return $tj_products;
    }
    //读取店铺详情
    public function get_store_data($store_id){
        $table="order_pai";
        $store_data=array();
        //店铺信息
        $sql_store="select store_id,store_logo,stroe_name from pai_store where store_id=$store_id";
        $store_info=Db::table($table)->query($sql_store);
        $storeinfo=array();
        if(!empty($store_info[0])){
            $storeinfo=$store_info[0];
            $storeinfo['store_logo']=$this->cdn_url.$storeinfo['store_logo'];
        }

        //店铺商品总数
        $store_goods_num=0;
        $sql="select count(g_id) as n from pai_goods where g_storeid=$store_id and g_state=6 GROUP by g_storeid  ";
        $list=Db::table($table)->query($sql);
        if(!empty($list[0]['n'])){
            $store_goods_num=$list[0]['n'];
        }

        //商家商品收藏总数
        $store_collection_num=0;
        $sql2="select count(g_id) as n from pai_goods_collection  where store_id=$store_id  GROUP by store_id";
        $list2=Db::table($table)->query($sql2);
        if(!empty($list2[0]['n'])){
            $store_collection_num=$list2[0]['n'];
        }
        //店铺上新总数
        $store_goods_newnum=0;
        $mtime=strtotime("-1 month");
        $sql3="select count(g_id) from pai_goods where g_storeid=$store_id and g_state=6 and g_addtime>$mtime  GROUP by g_storeid";
        $list3=Db::table($table)->query($sql3);
        if(!empty($list3[0]['n'])){
            $store_goods_newnum=$list3[0]['n'];
        }
        $store_data['store_goods_num']=$store_goods_num;
        $store_data['store_collection_num']=$store_collection_num;
        $store_data['store_goods_newnum']=$store_goods_newnum;
        $store_data['store_info']=$storeinfo;
        return $store_data;
    }
    //得到订单总数和拍买总数
    public function getordernum($gp_id){
        $rlist=array();
        $table="pai_order_pai";
        $sql1="select sum(gp_num) as onum from pai_order_pai where o_state NOT  in (1,10) and gp_id=$gp_id";
        $list1=Db::table($table)->query($sql1);
        $onum=0;
        if(!empty($list1[0]['onum']))
        {
          $onum=$list1[0]['onum'];
        }
        $sql2="select sum(gp_num) as jnum from pai_order_pai where o_paystate=2 and gp_id=$gp_id";
        $list2=Db::table($table)->query($sql2);
        $jnum=0;
        if(!empty($list2[0]['jnum']))
        {
        $jnum=$list2[0]['jnum'];
        }
        $sql3="select m.m_avatar from pai_order_pai op LEFT join pai_member m ON m.m_id=op.m_id where op.o_paystate=2 and op.gp_id=$gp_id";
        $list3=Db::table($table)->query($sql3);
        foreach($list3 as $k3=>$v3){
            $list3[$k3]['m_avatar']=$this->cdn_url.$v3['m_avatar'];
        }
        $rlist['onum']=$onum;
        $rlist['jnum']=$jnum;
        $rlist['member_headerimg']=$list3;
        return $rlist;
    }
    //添加取消商品收藏
    public function docollection($m_id,$type,$g_id,$store_id){
        $return=array("status"=>'1',"msg"=>"操作失败");
        $table="order_pai";
        $sql="select gc_id from pai_goods_collection where m_id=$m_id and g_id=$g_id ";
        $list=Db::table($table)->query($sql);
        if($type=='add'){
           if(!empty($list[0]['gc_id'])){
               $return=array("status"=>'0',"msg"=>"已经关注，不能重复关注");
               return $return;
           }
            $g_time=time();
            $sql1="INSERT INTO pai_goods_collection (g_id,g_time,m_id,store_id) VALUES ($g_id,$g_time,$m_id,$store_id) ";
            $res=Db::table($table)->execute($sql1);
            if($res){
                $return=array("status"=>'1',"msg"=>"关注成功");
                return $return;
            }
            else{
                $return=array("status"=>'0',"msg"=>"关注失败");
                return $return;
            }
        }
        if($type=='reduce'){
            if(empty($list[0]['gc_id'])){
                $return=array("status"=>'0',"msg"=>"已经不是关注");
                return $return;
            }
            $sql1="DELETE FROM pai_goods_collection WHERE m_id=$m_id and g_id=$g_id";
            $res=Db::table($table)->execute($sql1);
            if($res){
                $return=array("status"=>'1',"msg"=>"取消关注成功");
                return $return;
            }
            else{
                $return=array("status"=>'0',"msg"=>"取消关注失败");
                return $return;
            }
        }

    }
    //添加取消店铺收藏
    public function dostorecollection($m_id,$type,$store_id){
        $return=array("status"=>'1',"msg"=>"操作失败");
        $table="order_pai";
        $sql="select sc_id from pai_store_collection where m_id=$m_id and store_id=$store_id ";
        $list=Db::table($table)->query($sql);
        if($type=='add'){
            if(!empty($list[0]['sc_id'])){
                $return=array("status"=>'0',"msg"=>"已经关注，不能重复关注");
                return $return;
            }
            $sc_time=time();
            $sql1="INSERT INTO pai_goods_collection (store_id,sc_time,m_id) VALUES ($store_id,$sc_time,$m_id) ";
            $res=Db::table($table)->execute($sql1);
            if($res){
                $return=array("status"=>'1',"msg"=>"关注成功");
                return $return;
            }
            else{
                $return=array("status"=>'0',"msg"=>"关注失败");
                return $return;
            }
        }
        if($type=='reduce'){
            if(empty($list[0]['sc_id'])){
                $return=array("status"=>'0',"msg"=>"已经不是关注");
                return $return;
            }
            $sql1="DELETE FROM pai_store_collection WHERE m_id=$m_id and store_id=$store_id";
            $res=Db::table($table)->execute($sql1);
            if($res){
                $return=array("status"=>'1',"msg"=>"取消关注成功");
                return $return;
            }
            else{
                $return=array("status"=>'0',"msg"=>"取消关注失败");
                return $return;
            }
        }

    }
    //读取收藏商品列表
    public function get_collection_goods($m_id){
        $table="order_pai";
        $sql="select gc.gc_id,gc.g_id,gc.g_time,g.g_name,g.g_state from pai_goods_collection gc LEFT JOIN pai_goods g ON gc.g_id=g.g_id where gc.m_id=$m_id";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k=>$v){
                $min_price='0.00';
                $sql2="select MIN(gdr_price) as min_price from pai_goods_dt_record gdr where gdr.g_id=".$v['g_id'];
                $list2=Db::table($table)->query($sql2);
                if(!empty($list2[0]['min_price'])){
                    $min_price=$list2[0]['min_price'];
                }
                $list[$k]['min_price']=$min_price;
            }
        }
        return $list;
    }
    //读取商品类型
    public function get_goodstype($store_type){
        $table="order_pai";
        if($store_type=='2'){
            $sql="select gs_id,gs_name,gs_store_type,gs_des  from pai_goods_spec  where gs_store_type=2";
        }
        else{
            $sql="select  gs_id,gs_name,gs_store_type,gs_des   from pai_goods_spec";
        }
        $list=Db::table($table)->query($sql);
        return $list;
    }
    //添加评价
    public function do_add_review($data){
        $return=array("status"=>'0',"msg"=>"操作失败");
        //添加订单评价
        if(empty($data['store_id'])){
            $return=array("status"=>'0',"msg"=>"评价店铺ID为空store_id");
            return $return;
        }
        $store_id=$data['store_id'];
        if(empty($data['service_score'])){
            $return=array("status"=>'0',"msg"=>"店铺评价分数为空service_score");
            return $return;
        }
        $service_score=$data['service_score'];
        if(empty($data['logistics_score'])){
            $return=array("status"=>'0',"msg"=>"物流评价分数为空logistics_score");
            return $return;
        }
        $logistics_score=$data['logistics_score'];
        if(empty($data['order_id'])){
            $return=array("status"=>'0',"msg"=>"订单ID为空order_id");
            return $return;
        }
        $order_id=$data['order_id'];
        if(empty($data['m_id'])){
            $return=array("status"=>'0',"msg"=>"用户ID为空m_id");
            return $return;
        }
        $m_id=$data['m_id'];
        $state='0';
        $add_time=time();
        $table="order_pai";
        $sql="INSERT INTO pai_review_order (store_id,service_score,logistics_score,state,add_time,order_id,m_id) VALUES ($store_id,$service_score,$logistics_score,$state,$add_time,$order_id,$m_id)";
        $res=Db::table($table)->execute($sql);
        if(!res){
            $return=array("status"=>'0',"msg"=>"插入订单评价失败");
            return $return;
        }
        //添加商品评价
        if(empty($data['goods_score'])){
            $return=array("status"=>'0',"msg"=>"商品打分不能为空goods_score");
            return $return;
        }
        $goods_score=$data['goods_score'];
        if(empty($data['gp_id'])){
            $return=array("status"=>'0',"msg"=>"商品gp id不能为空gp_id");
            return $return;
        }
        $gp_id=$data['gp_id'];
        if(empty($data['rg_content'])){
            $return=array("status"=>'0',"msg"=>"商品评论不能为空rg_content");
            return $return;
        }
        $rg_content=$data['rg_content'];
        if(empty($data['rg_showname'])){
            $return=array("status"=>'0',"msg"=>"商品是否匿名为空rg_showname");
            return $return;
        }
        $rg_showname=$data['rg_showname'];
        $ro_id=$res;
        $add_time=time();
        $sql2="INSERT INTO pai_review_goods (ro_id,goods_score,add_time,state,gp_id,rg_content,rg_showname) VALUES ($ro_id,$goods_score,$add_time,$state,$gp_id,$rg_content,$rg_showname)";
        $res2=Db::table($table)->execute($sql2);
        if(!res2){
            $return=array("status"=>'0',"msg"=>"插入商品评价失败");
            return $return;
        }
        // 获取表单上传文件
        if(!empty($data['file_name'])){
            $files=$data['file_name'];
           // $files = request()->file($file);
            // 移动到框架应用根目录/public/uploads/ 目录下
            $name="rgi_img";
            $type="2";
            $w=800;
            $h=800;
            foreach($files as $file)
                $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH.'public'.DS.'uploads'.DS.$name);
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                // echo $info->getExtension();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                // echo $info->getFilename();
                //生成缩略图
                if ($type==2) {
                    $thumb = $this->thumbImg($info->getSaveName(), $name, $type, $w, $h);
                }else if($type==1){
                    $imgUrl = ROOT_PATH.'public' . DS . 'uploads'. DS . $name . DS .$info->getSaveName();
                    $image = \think\Image::open($imgUrl);
                    $image->thumb($w ,$h)->save($imgUrl);
                }
                $saveName="/uploads".DS.$name.DS.$info->getSaveName();
                $img_url=$saveName;
                $img_state=1;
                $rg_id=$res2;
                $sql3="INSERT INTO pai_review_goods_imgs (img_url,state,rg_id) VALUES ($img_url,$img_state,$rg_id)";
                $res3=Db::table($table)->execute($sql3);
                if(!res3){
                }
            }else{
                // 上传失败获取错误信息
                // echo $file->getError();
            }
        }
        $return=array("status"=>'1',"msg"=>"评论成功");
        return $return;
    }
    //图片压缩
    public function thumbImg($img, $name, $type ,$w=375 ,$h=286, $goods=''){

        $img = './uploads/'.$name.'/'.$img;
        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
        $riqi = date("Ymd",time());
        if ($goods) {
            $g_id = $goods['goods_id'] ;
        } else {
            $g_id = time() ;
        }

        if ($type==1) {
            $name = './uploads/thumb/'.$name.'/item'.$g_id.".jpg";
        } else if ($type==2) {

            $url = './uploads/thumb/'.$name;
            @mkdir('./uploads/thumb/',777,true);
            @mkdir($url,777,true);
            @chmod($url, 0777);

            $path = $url ;
            if (!file_exists($path)){
                define($path, __DIR__);
                mkdir($path);
            }

            $path2 = $url.'/'.$riqi;
            @mkdir($path2,777,true);
            @chmod($path2, 0777);
            if (!file_exists($path2)) {
                mkdir($path2);
            }
            $name = $path2.'/'.$name.$g_id.".jpg";
        }

        if (file_exists($img)) {
            if (!file_exists($name)) {
                $image = \think\Image::open($img);
                //dump($name);die;
                $image->thumb($w, $h,\think\Image::THUMB_CENTER)->save($name,'jpg');
            }
            $name = substr($name,1);
            $pic = $name ;
            return $pic;
        }
    }
    //读取商品类型
    public function get_goodscategory(){
        $table="goods";
        $sql="select gc_id,gc_name from pai_goods_category  where parent_id=0";
        $list=Db::table($table)->query($sql);
        if(!empty($list))
        {
          foreach($list as $k=>$v)
          {
              $sql1="select gc_id,gc_name from pai_goods_category  where parent_id=".$v['gc_id'];
              $list1=Db::table($table)->query($sql1);
              if(!empty($list1)){
                  foreach($list1 as $k1=>$v1) {
                      $sql2 = "select gc_id,gc_name from pai_goods_category  where parent_id=" . $v1['gc_id'];
                      $list2 = Db::table($table)->query($sql2);
                      $list1[$k1]['son2']=$list2;
                  }
              }
              $list[$k]['son1']=$list1;
          }
        }
        return $list;
    }
    //读取当前参拍人数
    public function doget_pai_member_cur($gdr_id,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT m.m_avatar,m.m_name,op.o_addtime,gdt.gdt_img,gdt.gdt_name,gdr.gdr_membernum  FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id LEFT JOIN pai.pai_goods_discounttype gdt ON gdt.gdt_id=gdr.gdt_id WHERE o_state=1 and op.gdr_id=$gdr_id ORDER BY op.o_addtime desc LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['gdt_img']=$this->cdn_url.$v3['gdt_img'];
                $list[$k3]['m_avatar']=$this->cdn_url.$v3['m_avatar'];
            }
        }
        return $list;
    }
    public function doget_pai_member_cur_count($where){
        $table="goods";
        $sql="SELECT count(op.o_id) as totalnum FROM pai.pai_order_pai op  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }
    //读取老的参拍人数
    public function doget_pai_member_old($where,$fields,$order,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT ".$fields." FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id LEFT JOIN pai.pai_goods_discounttype gdt ON gdr.gdr_id=gdr.gdr_id WHERE ".$where." ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['gdt_img']=$this->cdn_url.$v3['gdt_img'];
                $list[$k3]['m_avatar']=$this->cdn_url.$v3['m_avatar'];
            }
        }
        return $list;
    }
    //读取老的参拍人数
    public function doget_pai_member_old_count($where){
        $table="goods";
        $sql="SELECT count(op.o_id) as totalnum FROM pai.pai_order_pai op  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }
    //读取折扣列表
    public function doget_pai_gdrlist($where){
        $table="goods";
        $sql="SELECT gdr.gdr_id,gdr.g_id,gdr.gdt_id,gdr.gdr_membernum,gdr.gdr_price,gdt.gdt_id,gdt.gdt_name,gdt.gdt_img FROM pai.pai_goods_dt_record gdr LEFT JOIN pai.pai_goods_discounttype gdt ON gdr.gdt_id=gdt.gdt_id WHERE ".$where;
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k=>$v){
                $synum=0;
                $sql1="SELECT sum(op.gp_num) num FROM pai.pai_order_pai op WHERE op.o_state=1 and op.o_paystate=2 and op.gdr_id= ".$v['gdr_id'];
                $list1=Db::table($table)->query($sql1);
                if(!empty($list1[0]['num'])){
                    $synum=$v['gdr_membernum']-$list1[0]['num'];
                    if($synum<0){
                        $synum=0;
                    }
                    $list[$k]['synum']=$synum;
                }
                else{
                    $list[$k]['synum']=$v['gdr_membernum'];
                }
                $list[$k]['gdt_img']=$this->cdn_url.$v['gdt_img'];
            }
        }
        return $list;
    }
    //读取收藏商品列表
    public function doget_goods_collection_list($where,$fields,$order,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT ".$fields." FROM pai.pai_goods_collection gc LEFT JOIN pai.pai_goods g ON gc.g_id=g.g_id  LEFT JOIN pai.pai_goods_product gp ON gp.g_id=g.g_id LEFT JOIN pai_goods_dt_record gdr ON gdr.g_id=gc.g_id  WHERE ".$where." GROUP BY g.g_id ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['g_img']=$this->cdn_url.$v3['g_img'];
            }
        }
        return $list;
    }
    //读取收藏的商品总数
    public function doget_goods_collection_list_count($where){
        $table="goods";
        $sql="SELECT count(gc.gc_id) as totalnum FROM pai.pai_goods_collection gc  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }
    //读取收藏商家列表
    public function doget_store_collection_list($where,$fields,$order,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT ".$fields." FROM pai.pai_store_collection sc LEFT JOIN pai.pai_store s ON sc.store_id=s.store_id  WHERE ".$where." ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['store_logo']=$this->cdn_url.$v3['store_logo'];
            }
        }
        return $list;
    }
    //读取收藏的商家总数
    public function doget_store_collection_list_count($where){
        $table="goods";
        $sql="SELECT count(sc.store_id) as totalnum FROM pai.pai_store_collection sc  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }

    //读取是否收藏了商品
    public function dois_goods_collection($m_id,$g_id){
        $table="goods";
        $sql="SELECT gc_id FROM pai.pai_goods_collection  where g_id=$g_id and m_id=$m_id";
        $info=Db::table($table)->query($sql);
        if(!empty($info[0]['gc_id'])){
           $result=array("status"=>'1',"msg"=>"已收藏");
        }
        else{
            $result=array("status"=>'0',"msg"=>"未收藏");
        }
        return $result;
    }

    //读取当前参拍人数--所有折扣
    public function doget_pai_member_cur_all($gp_id,$curpage,$pagenum){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT m.m_avatar,m.m_name,op.o_addtime,gdt.gdt_img,gdt.gdt_name  FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id LEFT JOIN pai.pai_goods_discounttype gdt ON gdr.gdr_id=gdr.gdr_id WHERE op.o_state=1 and op.o_paystate=2 and op.gp_id=$gp_id ORDER BY op.o_addtime desc LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['gdt_img']=$this->cdn_url.$v3['gdt_img'];
                $list[$k3]['m_avatar']=$this->cdn_url.$v3['m_avatar'];
            }
        }
        return $list;
    }
    public function doget_pai_member_cur_all_count($where){
        $table="goods";
        $sql="SELECT count(op.o_id) as totalnum FROM pai.pai_order_pai op  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }
    //读取老的参拍人数--所有折扣
    public function doget_pai_member_old_all($where,$fields,$order,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT ".$fields." FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id LEFT JOIN pai.pai_goods_discounttype gdt ON gdr.gdr_id=gdr.gdr_id WHERE ".$where." ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['gdt_img']=$this->cdn_url.$v3['gdt_img'];
                $list[$k3]['m_avatar']=$this->cdn_url.$v3['m_avatar'];
            }
        }
        return $list;
    }
    //读取老的参拍人数---所有折扣
    public function doget_pai_member_old_all_count($where){
        $table="goods";
        $sql="SELECT count(op.o_id) as totalnum FROM pai.pai_order_pai op  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }
    //读取一级分类
    public function doget_first_category(){
        $table="goods";
        $sql="SELECT gc_id,gc_name,gc_img,gc_banner_img FROM pai.pai_goods_category  where parent_id=0";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k=>$v){
                $list[$k]['gc_img']=$this->cdn_url.$v['gc_img'];
                $list[$k]['gc_banner_img']=$this->cdn_url.$v['gc_banner_img'];
                $list[$k]['url'] = PAIYAYA_URL."/member/classify/index/gc_id/".$list[$k]['gc_id'];
            }
            $result=array("status"=>'1',"msg"=>"已读取数据","data"=>$list);
        }
        else{
            $result=array("status"=>'0',"msg"=>"没有数据");
        }
        return $result;
    }
    //读取分类
    public function doget_category($parent_id){
        $table="goods";
        $sql="SELECT gc_id,gc_name,gc_img,gc_banner_img FROM pai.pai_goods_category  where parent_id=$parent_id";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k=>$v){
                $list[$k]['gc_img']=$this->cdn_url.$v['gc_img'];
                $list[$k]['gc_banner_img']=$this->cdn_url.$v['gc_banner_img'];
                $list[$k]['url'] = PAIYAYA_URL."/member/classify/index/gc_id/".$list[$k]['gc_id'];
            }
            $result=array("status"=>'1',"msg"=>"已读取数据","data"=>$list);
        }
        else{
            $result=array("status"=>'0',"msg"=>"没有数据");
        }
        return $result;
    }
    //读取推荐分类
    public function doget_tj_category(){
        $table="goods";
        $sql="SELECT gc_id,gc_name,gc_img,gc_banner_img FROM pai.pai_goods_category  where gc_is_tj=1";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k=>$v){
                $list[$k]['gc_img']=$this->cdn_url.$v['gc_img'];
                $list[$k]['gc_banner_img']=$this->cdn_url.$v['gc_banner_img'];
                $list[$k]['url'] = PAIYAYA_URL."/member/classify/index/gc_id/".$list[$k]['gc_id'];
            }
            $result=array("status"=>'1',"msg"=>"已读取数据","data"=>$list);
        }
        else{
            $result=array("status"=>'0',"msg"=>"没有数据");
        }
        return $result;
    }




	
	
}