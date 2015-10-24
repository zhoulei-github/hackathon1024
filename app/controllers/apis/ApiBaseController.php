<?php

/**
 * hackathon1024
 *
 * Author: zhoulei <zhoulei.way@gmail.com>
 * Date: 2015/10/24 15:59:59
 */

class ApiBaseController extends BaseController
{
    protected function json($data, $code = 200, $message = '')
    {
        $data = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        return Response::json($data);
    }
}