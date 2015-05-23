<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'brand_id', 'category_id', 'price'];

    public static function getFakePopularProducts(){

       return Products::orderBy(DB::raw('RAND()'))->take(3)->get();
    }

    public static function getFakeProductToDay(){
        return Products::orderBy(DB::raw('RAND()'))->take(1)->get();
    }

    public function toArray()
    {
        $res = parent::toArray();

        if($res['brand_id']){
            $brand = Brands::find($res['brand_id']);
            $res['brand'] = ($brand) ? $brand->title : null;
        }

        if($res['category_id']){
            $category = Categories::find($res['category_id']);
            $res['category'] = ($category) ? $category->title : null;
        }

        return $res;
    }

}