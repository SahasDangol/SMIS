<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed gallery_id
 * @property \Illuminate\Http\UploadedFile image
 */
class GalleryImage extends Model
{
    protected $fillable = ['gallery_id','image'];


    public function gallery()
    {
        return $this->belongsTo('Modules\Gallery\Entities\Gallery','gallery_id');
    }
}

