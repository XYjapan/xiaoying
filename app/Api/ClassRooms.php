<?php
namespace App\Api;


use App\Models\ClassRoom;

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
     * 获取指定id的教室信息
     * @param $id
     * @return array
     */
    public function findClassRoom($id)
    {
        $res = ClassRoom::findClassRoom($id);

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