<?php
namespace App\Traits;

trait validateResponse
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error'=>$message,'code'=>$code], $code);
    }

    protected function validateData()
    {

    }
}