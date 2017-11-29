<?php
namespace App\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;

class Teachers extends Api
{
    /**
     * 查询列表
     * @param Request $request
     * @return array
     */
    public function getTeachers( Request $request )
    {
        // 准备需要查询的字段
        $field = ['id','nickname','email','promoted','promotedTime','loginTime','loginIp'];

        // 获取数据
        $teachers = Teacher::getTeachersByField($field);

        // 查询失败
        if ( !$teachers )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 数据封装
        $data = [
            'Teacher' => $teachers,
            'count' => Teacher::CountTeacher()
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
    public function findTeacher($id)
    {
        // 获取数据
        $res = Teacher::findTeacherById($id);

        // 查询失败
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);

        return $this->result;
    }
}