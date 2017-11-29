<?php
namespace App\Api;

use App\Models\OpenCourse;

class OpenCourses extends Api
{
    /**
     * 获取公开课列表
     * @return array
     */
    public function getOpenCourses()
    {
        $res = OpenCourse::getOpenCourses();

        // 查询失败
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }



    /**
     * 获取指定ID 的公开课详情
     * @param $id
     * @return array
     */
    public function getOpenCourseById($id)
    {
        $res = OpenCourse::getOpenCourseById($id);

        // 查询失败
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }

}