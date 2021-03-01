<?php

namespace ArsoftModules\MasterItem\Controllers;

use App\Http\Controllers\Controller;
use ArsoftModules\MasterItem\Models\Item;

class MasterItemController extends Controller
{
    public function data()
    {
        $listItems = Item::get();
        return $listItems;
    }
}