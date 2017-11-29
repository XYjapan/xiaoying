<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Article extends Model
{
    protected $table = 'article';

    // 白名单
    protected $fillable = ['title', 'tagIds', 'publishedTime','thumb','featured','promoted','userId','createdTime','updatedTime'];


    /**
     * 统计数量
     * @return mixed
     */
    protected static function CountArticle()
    {
        return self::count();
    }


    /**
     * 获取指定ID的一条数据
     * @param $id
     * @return bool
     */
    protected static function findArticleById( $id )
    {
        // 查询数据
        $res = self::find($id);

        // 判断并返回数据
        return !$res ? false : $res->toArray() ;
    }


    /**
     * 获取文章详情
     * @param array $field
     * @return mixed
     */
    protected static function getArticlesByField( array $field = [], $start = 0, $end = 20)
    {

        // 默认查所有
        if ( !$field )
        {
            $res = self::offset($start)
                ->limit($end)
                ->get();

            return !$res ? false : $res->toArray();
        }

        // 查询指定字段
        $res = self::select($field)
            ->offset($start)
            ->limit($end)
            ->get();

        return !$res ? false : $res->toArray();
    }
}
