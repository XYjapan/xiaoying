<?php
namespace App\Api\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Api\Api;

class CourseController extends Api
{
    /**
     * 查询课程列表
     * @param Request $request
     * @return array
     */
    public function getCourses( Request $request )
    {
        // 准备需要查询的字段
        $field = ['id','title','smallPicture','price','subtitle','serializeMode'];

        // 获取课程信息
        $courses = Course::getCoursesByField($field);

        // 查询失败
        if ( !$courses )
        {
            $this->setResult(400,false,null);
        }

        $data = [
            'course' => $courses,
            'count' => Course::CountCourse()
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
    public function findCourse($id)
    {
        // 获取数据
        $res = Course::findCourseById($id);

        if ( !$res )
        {
            $this->setResult(400,false,null);
        }

        // 设置返回值
        $this->setResult(200,true,$res);
        return $this->result;
    }

}