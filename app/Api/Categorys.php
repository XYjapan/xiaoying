<?php
namespace App\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Api\Api;

class Categorys extends Api
{

    /**
     * 获取课程分类列表
     * @return array
     */
    public function getCate()
    {
        $res = Category::cateList();

        $cate_list = $res['parent'];

        $len = count($cate_list);
        $son_len = count($res['son']);

        // 将子分类赋值给相应的父分类
        for ($i = 0; $i < $len; $i++)
        {
            for ($j = 0; $j < $son_len; $j++)
            {
                if ($res['son'][$j]['parentId'] == $cate_list[$i]['id'])
                {
                    $cate_list[$i]['son'][] = $res['son'][$j];
                }
            }
        }

        if (!$cate_list)
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $cate_list);

        return $this->result;

    }
}