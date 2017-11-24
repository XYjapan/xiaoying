<?php
namespace App\Api;

use Illuminate\Http\Request;
use App\Models\Cases;

class Cased extends Api
{
    /**
     * 查询列表
     * @param Request $request
     * @return array
     */
    public function getCases( Request $request )
    {
        // 准备需要查询的字段
        $field = ['univ','name','comid','from_univ','score_en','category','title','star'];

        // 获取数据
        $Cases = Cases::getCasesByField($field);

        // 查询失败
        if ( !$Cases )
        {
            $this->setResult(400,false,null);
            return $this->result;
        }

        // 数据封装
        $data = [
            'cases' => $Cases,
            'count' => Cases::CountCases()
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
    public function findCases($id)
    {
        // 获取数据
        $res = Cases::findCasesById($id);

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