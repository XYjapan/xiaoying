<?php
namespace App\Api;

use App\Models\School;
use Illuminate\Http\Request;

class Schools extends Api
{
    /**
     * 查询列表
     * @param Request $request
     * @return array
     */
    public function getSchools( Request $request )
    {
        // 准备需要查询的字段
        $field = ['zhanhui', 'name_cn', 'country_name','category_school','rank_world','competition','job_offer_rate'];

        // 获取数据
        $Schools = School::getSchoolsByField($field);

        // 查询失败
        if ( !$Schools )
        {
            $this->setResult(400,false,null);
            return $this->result;
        }

        // 数据封装
        $data = [
            'Schools' => $Schools,
            'count' => School::CountSchools()
        ];

        // 设置返回值
        $this->setResult(200,true, $data);
        return $this->result;

    }


    /**
     * 根据id获取指定的一条数据
     * @param $id
     * @return array
     */
    public function findSchools($id)
    {
        // 获取数据
        $res = School::findSchoolById($id);

        // 查询失败
        if ( !$res )
        {
            $this->setResult(400,false,null);
            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);
        return $this->result;
    }
}