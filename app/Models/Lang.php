<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'langs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lang', 'default'];


    public function toArray()
    {
        $res = parent::toArray();

        return $res;
    }

}