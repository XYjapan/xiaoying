<?php
namespace App\Api;

use App\Models\Article;
use Illuminate\Http\Request;

class Articles extends Api
{
    /**
     * 查询列表
     * @param Request $request
     * @return array
     */
    public function getArticles( Request $request )
    {
        // 准备需要查询的字段
        $field = ['id', 'title', 'tagIds', 'publishedTime','thumb','featured','promoted','userId','createdTime','updatedTime'];

        // 获取数据
        $Articles = Article::getArticlesByField($field);


        // 查询失败
        if ( !$Articles )
        {
            $this->setResult(400,false,null);
            return $this->result;
        }

        // 数据封装
        $data = [
            'Articles' => $Articles,
            'count' => Article::CountArticle()
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
    public function findArticle($id)
    {
        // 获取数据
        $res = Article::findArticleById($id);

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