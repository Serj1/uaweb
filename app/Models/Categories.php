<?php namespace App\Models;

Use Baum\Node;

class Categories extends Node
{

    protected $table = 'categories';

    protected $parentColumn = 'parent_id';

    protected $leftColumn = 'lft';

    protected $rightColumn = 'rgt';

    protected $depthColumn = 'depth';

    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');


    public static function getChilds($childs)
    {
        $res = [];

        foreach ($childs as $itm) {

            $item = [
                'id' => $itm->id,
                'title' => $itm->title
            ];

            $c = $itm->getImmediateDescendants();

            if (count($c) > 0) {
                $item['child'] = Categories::getChilds($c);
            }

            $res[] = $item;
        }

        return $res;
    }

    public static function buildMenu()
    {
        $root = Categories::root();

        $three = $root->getImmediateDescendants();

        $res = [];

        foreach ($three as $itm) {

            $item = [
                'id' => $itm->id,
                'title' => $itm->title
            ];

            $childs = $itm->getImmediateDescendants();

            if (count($childs) > 0) {
                $item['child'] = Categories::getChilds($childs);
            }

            $res[] = $item;
        }

        return $res;

    }

}