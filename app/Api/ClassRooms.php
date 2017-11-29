<?php
namespace App\Api;


use App\Models\ClassRoom;
use App\Models\ClassroomCourse;
use App\Models\ClassroomReview;
use App\Models\Course;
use App\Models\Thread;

class ClassRooms extends Api
{

    /**
     * 获取教室列表
     * @return array
     */
    public function getClassRooms()
    {
        $res = ClassRoom::getClassRooms();
        // 查询结果为空
        if ( !$res )
        {

            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }


    /**
     * 热门: 按点击量排序
     * @return array
     */
    public function byHot()
    {
        $classroom = ClassRoom::hotClassroom();

        $this->setResult(200, true, $classroom);

        return $this->result;
    }


    /**
     * 最新: 按ID排序
     * @return array
     */
    public function byNew()
    {
        $classroom = ClassRoom::newClassroom();

        $this->setResult(200, true, $classroom);

        return $this->result;
    }


    /**
     * 获取推荐班级
     * @return array
     */
    public function getRecommend()
    {
        $res = ClassRoom::recommendClassroom();

        // 查询结果为空
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }


    /**
     * 獲取班級內課程課程列表
     * @param $id
     * @return array
     */
    public function getCourses( $id )
    {
        // 獲取當前班級內所有課程的Id
        $ids = ClassroomCourse::classroomCourseIds($id);

        // 通過ids 獲取課程
        $res = Course::findCourseByIds($ids);

        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;

    }


    /**
     * 获取免费班級
     * @return array
     */
    public function getFreeClassroom()
    {
        $res = ClassRoom::freeClassRoom();

        // 查询结果为空
        if (!$res)
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }


    /**
     * 获取指定id的教室信息
     * @param $id
     * @return array
     */
    public function findClassRoom($id)
    {
        $res = ClassRoom::findClassRoom($id);

        // 查询结果为空
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;
    }

    /**
 * 根據班級ID 獲取評價信息
 * @param $id
 * @return array
 */
    public function getReview( $id )
    {
        // 獲取評價列表信息
        $res = ClassroomReview::getReview( $id );

        // 查询结果为空
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;

    }

    /**
     * 根據班級ID 獲取話題信息
     * @param $id
     * @return array
     */
    public function getTopic( $id )
    {
        // 獲取評價列表信息
        $res = Thread::getTopic( $id );

        dd($res);

        // 查询结果为空
        if ( !$res )
        {
            $this->setResult(200, false, null);

            return $this->result;
        }

        $this->setResult(200, true, $res);

        return $this->result;

    }

}