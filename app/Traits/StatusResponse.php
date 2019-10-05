<?php

namespace App\Traits;
/**
 * 
 */
trait StatusResponse
{
    protected function turnStatusOff($model){
        $model->status = 0;
        $model->save();
    }
    protected function turnStatusOn($model){
        $model->status = 1;
        $model->save();
    }
}
