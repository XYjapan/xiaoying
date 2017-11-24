<?php
namespace App\Api;

use App\Models\Course;
use Illuminate\Http\Request;

class Courses extends Api
{
    /**
     * 查询课程列表
     * @param Request $request
     * @return array
     */
    public function getCourses( Request $request, array $field = [])
    {
        // 准备需要查询的字段
        $field = ['id','title','smallPicture','price','subtitle','serializeMode'];

        // 获取课程信息
        $courses = Course::getCoursesByField($field);

        // 查询失败
        if ( !$courses )
        {
            $this->setResult(400,false,null);
            return $this->result;
        }

        // 课程总数
        $count = Course::CountCourse();
        // 分类列表
        $cate = Course::cateList();

        $data = [
            'course' => $courses,
            'count' => $count,
            'cate' => $cate
        ];

        // 设置返回值
        $this->setResult(200,true, $data);
        return $this->result;

    }

    /**
     * 热门: 按点击量排序
     * @return array
     */
    public function byHot()
    {
        $Courses = Course::hotCourses();
        $this->setResult(200, true, $Courses);
        return $this->result;
    }

    /**
     * 最新: 按点击量排序
     * @return array
     */
    public function byNew()
    {
        $Courses = Course::newCourses();
        $this->setResult(200, true, $Courses);
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
            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);
        return $this->result;
    }

}