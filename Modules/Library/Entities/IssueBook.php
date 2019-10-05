<?php

namespace Modules\Library\Entities;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    protected $fillable = ['id','issued_date','return_date','fine','book_id','user_id','deadline'];
public function books()
{
    return $this->belongsTo('Modules\Library\Entities\Book','book_id');
}
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
