<?php
namespace app\member\controller;
use app\admin\controller\Config;
use app\data\service\article\ArticleService;
use app\data\service\articleType\ArticleTypeService;
use app\data\service\incomeLog\IncomeLogService;
use app\data\service\member\MemberLevelService;
use app\data\service\member\MemberService;
use app\data\service\moneyLog\MoneyLogService;
use app\data\service\promoters\PromotersApplyService;
use app\data\service\store\StoreService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use think\Cache;
use think\Db;
use think\Image;
use think\Session;

class Core extends MemberHome
{

    /**
     * @return mixed
     * 会员中心
     * 邓赛赛
     */
        public function index(){
            $mem = new MemberService();
            $m_id = $this->m_id;
            $where = [
                'm_id'=>$m_id,
            ];
            //本人信息
            $field = 'm_id,m_name,m_avatar,m_levelid,tj_mid,m_mobile,m_code,experience,m_mobile,is_promoters,promoters_code';
            $info = $mem->get_info($where,$field);
            //本人等级信息
            $member_level = new MemberLevelService();
            $level = $member_level->get_info(['ml_id'=>$info['m_levelid']],'ml_tj1,ml_tj2,ml_name,ml_img');
            //考核期推广员等级头像
            if($info['is_promoters'] == 4 || $info['is_promoters'] == 5){
                $level['ml_img'] = '/uploads/logo/ml_tgy.png';
            }
            $info = array_merge($info,$level);
            $where = [
                'ml_id'=>['>',$info['m_levelid']]
                ];
            $target = $member_level->get_limit($where,$order='ml_id asc',$field='ml_name',$offset='0',$page_size='1');

            $info['target'] = empty($target[0]['ml_name']) ? '' : $target[0]['ml_name'];
            //无二维码时，生成新二维码
            if(empty($info['m_code']) || !is_file(trim($info['m_code'],'/')) ){
                $info['m_code'] = $mem->new_code(['m_id'=>$info['m_id']]); //检测是否有二维码,无时生成新的二维码
            }

            //推荐者信息
            $tj_info = array();
            if($info['tj_mid']){
                $tj_m_id = $info['tj_mid'];
                $where2 = [
                    'm_id'=>$tj_m_id
                ];
                $field = 'm.m_name tj_name,m.m_mobile tj_m_mobile,m.m_avatar tj_m_avatar,ml.ml_name tj_ml_name';
                $tj_info = Db::table('pai_member m')->join('pai_member_level ml','m.m_levelid=ml.ml_id','left')->where($where2)->field($field)->find();
                //处理手机号码
                $tj_m_mobile = empty($tj_info['tj_m_mobile']) ?  '' : $tj_info['tj_m_mobile'];
                $tj_m_mobile = $member_level->decrypt($tj_m_mobile);
                $tj_info['tj_m_mobile'] = substr_replace($tj_m_mobile,'****',3,4);
                //处理名字
                $tj_name = empty($tj_info['tj_name']) ?  '' : $tj_info['tj_name'];
                $tj_info['tj_name2'] = $tj_name;
                $name_len = mb_strlen($tj_name);
                switch($name_len){
                    case 1:
                    case 2:
                        $tj_name = mb_substr($tj_name,0,1).'**';
                        break;
                    default:
                        $tj_name = mb_substr($tj_name,0,1).'**'.mb_substr($tj_name,-1);
                        break;
                }
                $tj_info['tj_name'] = $tj_name;

            }
            $info['tj'] = $tj_info;
            $money = new MoneyLogService();
            $where = [
                'm_id'=>$m_id,
                'ml_type'=>'add',
                'state'=>8
            ];
            //money最大值
            $max_money = $money->max_money($where,'ml_money');
            $max_money = sprintf("%.2f",$max_money);
            //邀请会员数和商家数量(暂时隐藏)
           //邀请人数
//            $count_where = [
//                'tj_mid'=>$m_id,
//                'm_type'=>['in',[0,1,3]],
//                'm_state'=>0,
//            ];
//            $array_count = $mem->count($count_where);
            //邀请人数 成功邀请和未成功邀请
            $order_pai = new OrderPaiService();
            $array_count = $order_pai->get_participate_num($m_id);
            $m_mobile = empty($info['m_mobile']) ? '' : $mem->decrypt($info['m_mobile']) ;
            $info['m_mobile'] = $m_mobile;
            //权益列表
            $articles = $this->interests_dsc();
            $this->assign('articles',$articles);
            // 累计消费金额(lyh)
            $orderpai = new OrderPaiService();
            $total_pay = $orderpai -> get_total_pay($m_id);
            $this->assign(['info'=>$info,'array_count'=>$array_count,'max_money'=>$max_money]);
            $this->assign('header_title','会员中心');
            $this->assign('total_pay',sprintf("%.2f",$total_pay));

            //分享参数
            $this->assign('share_title','邀您入驻拍吖吖，享大福利！');
            $this->assign('share_desc','5折！3折！1折！还有1元价！尽在拍吖吖，快来抢购吧');
            $this->assign('share_link','https://m.paiyy.com.cn/member/register/it_to_rg/phone/'.$m_mobile);
            return $this->fetch();
        }

    /**
     * ajax请求会员权益
     * 邓赛赛
     */
    public function interests_dsc(){
        //权益信息
        $article_type = new ArticleTypeService();
        $at_name_arr = [
            '普通会员','白银会员','黄金会员','黑金会员','推广员'
        ];
        $a_name_arr = [
            '观望奖','立返推荐费','成长加速'
        ];
        $articles = array();
        foreach($at_name_arr as $k => $v){
            foreach($a_name_arr as $value){
                $where = [
                    'at.at_name'    => $v,
                    'at.at_state'   => 0,
                    'a.a_name'      => $value,
                    'a.a_state'     => 0
                ];
                $article = $article_type->articleTypeJoinArticle($where,'a.a_id asc','a.a_id,a.a_name,a.a_description,a.a_img');
                $article['a_id']    = empty($article['a_id']) ? '' : $article["a_id"];
                $article['a_name']  = empty($article['a_name']) ? '' : $article["a_name"];
                $article['a_description'] = empty($article['a_description']) ? '' : htmlspecialchars_decode($article["a_description"]);
                $article['a_img']   = empty($article['a_img']) ? '' : $article["a_img"];
                $articles[$k][] = $article;
            }
        }
        return $articles;
    }

    /**
     * 邀请会员(此页面暂停使用，无按钮)
     * 邓赛赛
     */
    public function invitation(){
        $m_id = $this->m_id;
        $mem = new MemberService();
        $where=['m_id'=>$m_id];
        $info = $mem->get_info($where,'m_code,m_name');
        if(empty($info['m_code'])){
            $info['m_code'] = $mem->new_code($where); //检测是否有二维码,无时生成新的二维码
        }
        $this->assign('info',$info);
        return $this->fetch();
    }

    /**
     * @return false|mixed|\PDOStatement|string|\think\Collection
     * 会员/商家邀请列表
     * 邓赛赛
     */
    public function invitations_list(){
        $m_type = input('param.m_type');       //0:会员  1:商家
        $m_type = empty($m_type) ? 0 : $m_type;
        $page = input('param.page');
        $page_size = input('param.page_size') ?  input('param.page_size') :20;

        $member = new MemberService();
        $money_where = [
            'm_id'=>$this->m_id,
            "money_type" => 2,
            "ml_type" => "add"
        ];
         $order='';
        $field='';
        if($m_type == 0){               //邀请会员列表
            $where = [
                'tj_mid'=>$this->m_id,
                'm_type'=>$m_type,
                'm_state'=>0,
            ];
            $order='add_time desc';
            $field='m_name,m_mobile,m_type,m_id';
        }else if($m_type == 1){         //邀请商家列表
            $where = [
                'm.tj_mid'=>$this->m_id,
                'm.m_type'=>1,
                'm.m_state'=>0,
            ];
            $order='m.add_time desc';
            $field='s.stroe_name,m.m_mobile,m.m_type,m.m_id';
        }
        $list = $member->its_list($m_type,$where,$money_where,$order,$field,$page,$page_size);
        foreach($list['list'] as $k => $v){
            $list['list'][$k]['m_mobile'] = '';
            if(strlen($v['m_mobile']) == 16){
                $m_mobile = $member->decrypt($v['m_mobile']);
                $list['list'][$k]['m_mobile'] = substr($m_mobile,0,3)."****".substr($m_mobile,7,4);
            }
        }
        if(request()->isAjax()){
            return $list;
        }
        $this->assign(['list'=>$list]);
        $this->assign(['m_type'=>$m_type]);
        $this->assign('header_title','邀请所得');
        return $this->fetch();
    }



//    /**
//     * @return false|mixed|\PDOStatement|string|\think\Collection
//     * 会员/商家所得明细
//     * 邓赛赛
//     */
//    public function invitations_detail(){
//        $page = input('get.page') ? input('get.page') : 1;
//        $page_size = input('get.page_size') ?  input('get.page_size') :20;
//        $where = [
//            'l.il_mid'=>$this->m_id,
//        ];
//        $incomelog = new IncomeLogService();
//        $field = 'l.il_mid,l.il_form_mid,l.il_time,m.m_type,m.m_name,m.m_mobile';
//        $list = $incomelog->get_limits($where,'l.il_time desc',$field,$page,$page_size);
//        dump($list);die;
//    }

    /**
     * @return \think\response\View
     * 点击继续邀请(进入活动页面)
     * 邓赛赛
     */
    public function continue_invitation(){
        $m_id = $this->m_id;
        $mem = new MemberService();

        $where = ['m_id'=>$m_id];
        $info = $mem->get_info($where,'m_mobile,m_code');
        $info['m_mobile'] = $mem->decrypt($info['m_mobile']);
        if(empty($info['m_code']) || !is_file(trim($info['m_code'],'/'))){
            $info['m_code'] = $mem->new_code($where); //检测是否有二维码,无时生成新的二维码
        }
        //活动时间
        $a_type = new ArticleTypeService();
        $where = [
            'at_name'   =>trim('邀请新人活动规则'),
            'at_state'  =>0
        ];
        $at_id = $a_type->articleTypeValue($where,'at_id');

        if(!$at_id){
            $activity_time = '';
        }else{
            $article = new ArticleService();
            $content = $article->articleValue(['a_type'=>$at_id],'a_author');
            $activity_time = htmlspecialchars_decode($content);
        }

        $header_title='邀请好友入驻';
        $this->assign('header_title',$header_title);
        $this->assign('info',$info);
        $this->assign('activity_time',$activity_time);

        //分享参数
        $this->assign('share_title','邀您入驻拍吖吖，享大福利！');
        $this->assign('share_desc','新人注册立得10元现金！各种折扣尽在拍吖吖，快来抢购吧！');
        $this->assign('share_link',PAI_URL.'/member/register/it_to_rg/phone/'.$info['m_mobile']);
        $this->assign('share_imgUrl',PAI_URL.'/uploads/logo/new_10.png');

        return view();
    }

    /**
     * 活动规则页面
     * 邓赛赛
     */
    public function rule(){
        $this->assign('header_title','活动规则');
        return view();
    }

    /**
     * 如何升级页面
     * 邓赛赛
     */
    public function upgrade(){
        $m_id = $this->m_id;
        $where = [
            'm_id'=>$m_id
        ];
        $mem = new MemberService();
        $field = 'm_levelid,experience,m_avatar,m_code,m_mobile';
        $info = $mem->get_info($where,$field);                                      //本人信息
        if(empty($info['m_code'])){
            $info['m_code'] = $mem->new_code(['m_id'=>$info['m_id']]); //检测是否有二维码,无时生成新的二维码
        }

        $member_level = new MemberLevelService();
        $level = $member_level->get_info(['ml_id'=>$info['m_levelid']],'ml_name,ml_tj2');
        $where = [
            'ml_id'=>['>',$info['m_levelid']]
        ];
        $info['next_name'] = $member_level->get_value($where,'ml_name next_name');
        $info = array_merge($info,$level);
        $this->assign('info',$info);
        $this->assign('header_title','会员等级成长');

        $mobile = $mem->decrypt($info['m_mobile']);
        //分享参数
        $this->assign('share_title','邀您入驻拍吖吖，享大福利！');
        $this->assign('share_desc','5折！3折！1折！还有1元价！尽在拍吖吖，快来抢购吧');
        $this->assign('share_link','https://m.paiyy.com.cn/member/register/it_to_rg/phone/'.$mobile);

        return view();
    }



}