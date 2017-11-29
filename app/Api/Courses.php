<?php
namespace App\Api;

use App\Models\Course;
use App\Models\Category;
use App\Models\CourseLesson;
use App\Models\CourseNote;
use App\Models\CourseReview;

class Courses extends Api
{

    /**
     * 獲取當前課程的所有授課老師
     * @param $id 課程ID
     * @return array 當前課程所有老師的預覽信息
     */
    public function getTeacher( $id )
    {
        $res = Course::courseTeacher( $id );

        // 查詢結果為空
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $ids = $res['teacherIds'];

        $ids = trim($ids, '|');

        $ids = explode('|', $ids );

        // TODO: 目前只是獲取到Id，用戶接口完成后，添加/使用 getUserBuIds 方法，獲取老師的信息

        dd($ids);

        // 设置返回值
        $this->setResult(200,true, $ids);

        return $this->result;

    }

    /**
     * 查询课程列表
     * @param array $field
     * @return array
     */
    public function getCourses( array $field = [])
    {
        // 准备需要查询的字段
        if ( empty($field) )
        {
            $field = ['id','title','smallPicture','price','subtitle','serializeMode'];
        }

        // 获取课程信息
        $courses = Course::getCoursesByField($field);

        // 查询失败
        if ( !$courses )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 课程总数
        $count = Course::CountCourse();
        // 分类列表
        $cate = Category::cateList();

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
     * 根据id获取指定的一条数据
     * @param $id
     * @return array
     */
    public function findCourse($id)
    {
        // 获取数据
        $res = Course::findCourseById($id);

        // 无效的id
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);

        return $this->result;
    }

    /**
     * 獲取課程的課時信息
     * @param $id
     * @return array
     */
    public function getLessons( $id )
    {
        $res = CourseLesson::getLessons( $id );

        // 无效的id
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);

        return $this->result;

    }


    /**
     * 獲取當前課程的評價信息列表
     * @param $id
     * @return array
     */
    public function getReview( $id )
    {
        $res = CourseReview::getReview( $id );

        // 无效的id
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);

        return $this->result;

    }


    /**
     * 获取当前课程的笔记列表
     * @param $id
     * @return array
     */
    public function getNotes( $id )
    {
        $res = CourseNote::getNotes( $id );

        // 无效的id
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 设置返回值
        $this->setResult(200,true,$res);

        return $this->result;

    }


    /**
     * 获取指定分类下的课程 根据分类
     * @param $cateid
     * @return array
     */
    public function getCategoryCourses($cateid)
    {
        $cateList = Category::cateList($cateid); // 获取所有分类

        $len = count($cateList); // 分类总条数

        for ($i=0; $i<$len; $i++)
        {
            if ($cateList[$i]['parentId'] == $cateid)
            {
                $cateid .= ','.$cateList[$i]['id'];
            }
        }

        // 当前分类与其子分类的结果集
        $cateids = explode(',', $cateid);

        $res = Course::cateCourses($cateid, $cateids);

        // 该分类下暂无数据
        if ( empty($res) )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        // 返回结果集
        $this->setResult(200, true, $res);

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
     * 最新: 按ID排序
     * @return array
     */
    public function byNew()
    {
        $Courses = Course::newCourses();

        $this->setResult(200, true, $Courses);

        return $this->result;
    }


    /**
     * 获取推荐课程
     * @return array
     */
    public function getRecommend()
    {
        $res = Course::recommendCourse();

        $this->setResult(200, true, $res);

        return $this->result;
    }


    /**
     * 获取免费课程
     * @return array
     */
    public function getFreeCourse()
    {
        $res = Course::freeCourse();

        if (!$res)
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }


}