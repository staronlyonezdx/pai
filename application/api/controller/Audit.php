<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/12/7
 * Time: 14:34
 */

namespace app\api\controller;


class Audit
{
    //ios审核期间
    public function audit_period(){
        $return_data = array(
            'data'=>array(
                'status'=>0,
                'code'=>135790,
            ),
        );
        $return_data = json_encode($return_data);
        return $return_data;
    }
}