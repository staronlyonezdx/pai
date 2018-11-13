<?php
/**
 * 地址Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 广州市素材火信息科技有限公司
 * 创建日期 2017-07-12
 * 版本 v.1.0.0
 * 网站：www.sucaihuo.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\admit;
use app\data\model\businessAuth\BusinessAuthModel;
use app\data\model\storeCategory\storeCategoryModel;
use app\data\service\BaseService as BaseService;
use think\Loader;
use think\Db;
class AdmitService extends BaseService
{
//    protected $cache = 'address';

    public function __construct()
    {
        parent::__construct();
        $this->admit = new BusinessAuthModel();
//        $this->cache = 'address';

    }

    /**
     * 获取店铺分类
     */
    public function storeCategory(){
        $category = new storeCategoryModel();
        $list = $category->getCategory();
        return $list;
    }
    /**
     * 前台申请入驻为商家
     * 创建人 邓赛赛
     */
    public function admitApplication($m_id,$data)
    {
        $insertInfo = [
            'corporation_name'          => $data['corporation_name'],
            'm_id'                      => $m_id,//会员ID
            'pid'                       => $data['pid'],
            'address'                   => $data['address'],
            'ba_bankname'               => $data['ba_bankname'],
            'ba_bankaccount'            => $data['ba_bankaccount'],
            'ba_license'                => empty($data['ba_license']) ? '' :  $data['ba_license'],
            'ba_stroe_name'             => empty($data['ba_stroe_name']) ? '' :  $data['ba_stroe_name'],
            'store_categoryid'          => empty($data['store_categoryid']) ? ''  :  $data['store_categoryid'],
            'store_tel'                 => empty($data['store_tel']) ? ''  : $data['store_tel'],
            'ba_legal_person'           => empty($data['ba_legal_person']) ?  '' : $data['ba_legal_person'],
            'ba_legal_person_tel'       => empty($data['ba_legal_person_tel']) ? ''  : $data['ba_legal_person_tel'],
            'ba_legal_person_idnumber'  => empty($data['ba_legal_person_idnumber']) ? '' : $data['ba_legal_person_idnumber'],
            'ba_identification_positive_img'  =>    empty($data['ba_identification_positive_img']) ? '' : $data['ba_identification_positive_img'],
            'ba_identification_negative_img'  =>    empty($data['ba_identification_negative_img']) ? '' : $data['ba_identification_negative_img'],
            'ba_license_img'                  =>    empty($data['ba_license_img']) ? ''  : $data['ba_license_img'],
            'ba_addtime'                      =>    time(),
        ];

        $address = explode(',',$insertInfo['pid']);
        $insertInfo['pid'] = empty($address[0]) ? '' : $address[0];
        $insertInfo['cid'] = empty($address[1]) ? '' : $address[1];
        $insertInfo['aid'] = empty($address[2]) ? '' : $address[2];

        //身份证正面
// //        $positive_img = request()->file('ba_identification_positive_img');
//         if($insertInfo['ba_identification_positive_img']){
//             $insertInfo['ba_identification_positive_img'] = $this->upload("identification",'ba_identification_positive_img',0,500,200);
//         }
//         //身份证反面
// //        $negative_img = request()->file('ba_identification_negative_img');
//         if($insertInfo['ba_identification_negative_img']){
//             $insertInfo['ba_identification_negative_img'] = $this->upload("identification",'ba_identification_negative_img',0,500,200);
//         }
//         //营业执照
// //        $files = request()->file('ba_license_img');
//         if($insertInfo['ba_license_img']){
//             $insertInfo['ba_license_img'] = $this->upload("license",'ba_license_img',0,1000,800);
//         }
        //身份证正面
        $positive_img = request()->file('ba_identification_positive_img');
        if($positive_img){
            $insertInfo['ba_identification_positive_img'] = $this->upload("identification",'ba_identification_positive_img',0,500,200);
        }else{
            if(!empty($insertInfo['ba_identification_positive_img']) && is_array($insertInfo['ba_identification_positive_img']) ){
                $insertInfo['ba_identification_positive_img'] = array_values(array_filter($insertInfo['ba_identification_positive_img']));
                $insertInfo['ba_identification_positive_img'] = $this->admit->ba64_img($insertInfo['ba_identification_positive_img'],'identification')[0];
            }else{
                unset($insertInfo['ba_identification_positive_img']);
            }
        }

        //身份证反面
        $negative_img = request()->file('ba_identification_negative_img');
        if($negative_img){
            $insertInfo['ba_identification_negative_img'] = $this->upload("identification",'ba_identification_negative_img',0,500,200);
        }else{
            if(!empty(array_filter($insertInfo['ba_identification_negative_img'])) && is_array($insertInfo['ba_identification_negative_img']) ){
                $insertInfo['ba_identification_negative_img'] = array_values(array_filter($insertInfo['ba_identification_negative_img']));
                $insertInfo['ba_identification_negative_img'] = $this->admit->ba64_img($insertInfo['ba_identification_negative_img'],'identification')[0];
            }else{
                unset($insertInfo['ba_identification_negative_img']);
            }
        }
        //营业执照
        $ba_license_img = request()->file('ba_license_img');
        if($ba_license_img){
            $insertInfo['ba_license_img'] = $this->upload("identification",'ba_license_img',0,500,200);
        }else{
            if(!empty($insertInfo['ba_license_img']) && is_array($insertInfo['ba_license_img']) ){
                $insertInfo['ba_license_img'] = array_values(array_filter($insertInfo['ba_license_img']));
                $insertInfo['ba_license_img'] = $this->admit->ba64_img($insertInfo['ba_license_img'],'identification')[0];
            }else{
                unset($insertInfo['ba_license_img']);
            }
        }

        $res = $this->admit->getAdd($insertInfo);
        if($res){
            return ['status'=>1,'msg'=>'申请成功'];
        }else{
            return ['status'=>0,'msg'=>'申请失败,请稍后重试'];
        }
    }
    /**
     * 获取单个会员申请信息
     * 邓赛赛
     */
    public function getApplication($m_id){
        $map = [
            'm_id'=>$m_id,
        ];
        $field = "ba_id,m_id,corporation_name,pid,cid,aid,address,ba_bankname,ba_bankaccount,ba_describe,
	    ba_license,store_categoryid,store_tel,ba_legal_person,ba_legal_person_tel,ba_legal_person_idnumber,ba_license_img,ba_addtime,ba_state,ba_identification_positive_img,ba_identification_negative_img";
        $info = $this->admit->getBusinessAuth($map,'ba_addtime desc',$field);

        return $info;
    }


    //前台会员修改自己的申请商家详情
    public function upApplication($m_id,$data){
        // dump($data);die;
        $insertInfo = [
            'corporation_name'                  => empty($data['corporation_name']) ? '' :$data['corporation_name'],
            'pid'                               => empty($data['pid']) ? '' :$data['pid'],
            'address'                           => empty($data['address']) ? '' :$data['address'],
            'ba_bankname'                       => empty($data['ba_bankname']) ? '' :$data['ba_bankname'],
            'ba_bankaccount'                    => empty($data['ba_bankaccount']) ? '' :$data['ba_bankaccount'],
            'ba_license'                        => empty($data['ba_license']) ? '' :$data['ba_license'],
            'ba_stroe_name'                     => empty($data['ba_stroe_name']) ? '' :  $data['ba_stroe_name'],
            'store_categoryid'                  => empty($data['store_categoryid']) ? '' :$data['store_categoryid'],
            'store_tel'                         => empty($data['store_tel']) ? '' :$data['store_tel'],
            'ba_legal_person'                   => empty($data['ba_legal_person']) ? '' :$data['ba_legal_person'],
            'ba_legal_person_tel'               => empty($data['ba_legal_person_tel']) ? '' :$data['ba_legal_person_tel'],
            'ba_legal_person_idnumber'          => empty($data['ba_legal_person_idnumber']) ? '' :$data['ba_legal_person_idnumber'],
            'ba_identification_positive_img'    => empty($data['ba_identification_positive_img']) ? '' : $data['ba_identification_positive_img'],
            'ba_identification_negative_img'    => empty($data['ba_identification_negative_img']) ? '' : $data['ba_identification_negative_img'],
            'ba_license_img'                    => empty($data['ba_license_img']) ? ''  : $data['ba_license_img'],
        ];
        $address = explode(',',$insertInfo['pid']);
        $insertInfo['pid'] = empty($address[0]) ? '' : $address[0];
        $insertInfo['cid'] = empty($address[1]) ? '' : $address[1];
        $insertInfo['aid'] = empty($address[2]) ? '' : $address[2];
        $insertInfo = array_filter($insertInfo);

        //身份证正面
        $positive_img = request()->file('ba_identification_positive_img');
        if($positive_img){
            $insertInfo['ba_identification_positive_img'] = $this->upload("identification",'ba_identification_positive_img',0,500,200);
        }else{
            if(!empty($insertInfo['ba_identification_positive_img']) && is_array($insertInfo['ba_identification_positive_img']) ){
                $insertInfo['ba_identification_positive_img'] = array_values(array_filter($insertInfo['ba_identification_positive_img']));
                $insertInfo['ba_identification_positive_img'] = $this->admit->ba64_img($insertInfo['ba_identification_positive_img'],'identification')[0];
            }else{
                unset($insertInfo['ba_identification_positive_img']);
            }
        }

        //身份证反面
        $negative_img = request()->file('ba_identification_negative_img');
        if($negative_img){
            $insertInfo['ba_identification_negative_img'] = $this->upload("identification",'ba_identification_negative_img',0,500,200);
        }else{
            dump($insertInfo['ba_identification_negative_img']);
            if(!empty(array_filter($insertInfo['ba_identification_negative_img'])) && is_array($insertInfo['ba_identification_negative_img']) ){
                $insertInfo['ba_identification_negative_img'] = array_values(array_filter($insertInfo['ba_identification_negative_img']));
                $insertInfo['ba_identification_negative_img'] = $this->admit->ba64_img($insertInfo['ba_identification_negative_img'],'identification')[0];
            }else{
                unset($insertInfo['ba_identification_negative_img']);
            }
        }
        //营业执照
        $ba_license_img = request()->file('ba_license_img');
        if($negative_img){
            $insertInfo['ba_license_img'] = $this->upload("identification",'ba_license_img',0,500,200);
        }else{
            if(!empty($insertInfo['ba_license_img']) && is_array($insertInfo['ba_license_img']) ){
                $insertInfo['ba_license_img'] = array_values(array_filter($insertInfo['ba_license_img']));
                $insertInfo['ba_license_img'] = $this->admit->ba64_img($insertInfo['ba_license_img'],'identification')[0];
            }else{
                unset($insertInfo['ba_license_img']);
            }
        }

        // //身份证正面
        // if(!empty($insertInfo['ba_identification_positive_img'])){
        //     $insertInfo['ba_identification_positive_img'] = $this->upload("identification",'ba_identification_positive_img',0,500,200);
        // }
        // //身份证反面
        // if(!empty($insertInfo['ba_identification_negative_img'])){
        //     $insertInfo['ba_identification_negative_img'] = $this->upload("identification",'ba_identification_negative_img',0,500,200);
        // }
        // //营业执照
        // if(!empty($insertInfo['ba_license_img'])){
        //     $insertInfo['ba_license_img'] = $this->upload("license",'ba_license_img',0,1000,800);
        // }
        $map = [
            'm_id'=>$m_id,
        ];
        $insertInfo['ba_state'] = 0;
        $res = $this->admit->dataSave($map,$insertInfo);
        if($res){
            return ['status'=>1,'msg'=>'修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败,请稍后重试'];
        }
    }

    /**
     * 管理员获取获取管理员商家申请列表列表
     * @param $map
     * @return \think\Paginator
     * 邓赛赛
     */

    public function getBusinessAuthList($map){
        if(empty($map)){
            $map = [];
        }
        $list = $this->admit->getBusinessAuth($map,'ba_addtime desc','*');
        return $list;
    }

    /**
     * 获取单个信息
     * @param array $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function vdRegister($where=[],$field="*"){
        $info = $this->admit->getInfo($where,$field);
        return $info;
    }


}