<?php

namespace App\Helpers;

class ApiResource
{
    public static function getResponse($code = 200, $msg = null , $data = null)
    {
        $response =
        [
            "code"=> $code,
            "massage"=> $msg,
            "data"=> $data,
        ];

            return response()->json($response , $code);

    }

}



