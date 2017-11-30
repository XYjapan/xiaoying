<?php
namespace App\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Api\Api;

class Categorys extends Api
{
    public function getCate()
    {
        $res = Category::cateList();
        dd($res);
    }
}