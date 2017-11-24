<?php

namespace App\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Api extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // 规范 API 返回值输出格式
    protected $result = array(
        'code' => 200,
        'status' => '',
        'data' => ''
    );

    /**
     * @method 设置 API 返回值
     * @param int $code 返回码
     * @param string $status 是否有数据
     * @param string $data 实体数据
     */
    protected function setResult($code = 200, $status = '', $data = '')
    {
        $this->result['code'] = $code;
        $this->result['status'] = $status;
        $this->result['data'] = $data;
    }



}
