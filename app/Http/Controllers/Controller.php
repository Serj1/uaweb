<?php namespace App\Http\Controllers;

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

    }

    public function setLang($id)
    {
        $lang = Lang::find($id);

        if (!$lang) {
            throw new Exception('Lang not found');
        }

        $this->current_lang = $id;

    }



}
