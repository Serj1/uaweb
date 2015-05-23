<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsFooterMenu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings_footer_menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'page_id', 'url', 'order'];


    public static function buildMenu()
    {
        $res = [];

        $menu = SettingsFooterMenu::orderBy('order')->get();

        foreach ($menu as $itm) {
            $el['title'] = $itm->title;
            if ($itm->page_id) {
                $el['url'] = '/page/' . $itm->page_id;
            } else {
                $el['url'] = $itm->url;
            }

            $res[] = $el;

        }

        return $res;
    }

}