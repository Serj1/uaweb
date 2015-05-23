<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brands extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'brands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'type'];

    public static function getFakePopularBrands()
    {

        return Brands::orderBy(DB::raw('RAND()'))->take(3)->get();
    }

    public function toArray()
    {
        $res = parent::toArray();

        return $res;
    }

}