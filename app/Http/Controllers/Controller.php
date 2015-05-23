<?php namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Lang;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class Controller extends BaseController
{
    public $current_lang = null;

    public $current_city = null;

    public function __construct()
    {

        if (!$this->current_lang) {
            $lang = Lang::orderBy(DB::raw('RAND()'))->take(1)->get();
            $this->current_lang = $lang[0]->id;
        }

        if (!$this->current_city) {
            $city = Cities::orderBy(DB::raw('RAND()'))->take(1)->get();
            $this->current_city = $city[0]->id;
        }

    }

    public function setLang($id)
    {
        $lang = Lang::find($id);

        if (!$lang) {
            throw new Exception('Lang not found');
        }

        $this->current_lang = $id;

    }

    public function setCity($id)
    {
        $city = Cities::find($id);

        if (!$city) {
            throw new Exception('City not found');
        }

        $this->current_city = $id;

    }


}
