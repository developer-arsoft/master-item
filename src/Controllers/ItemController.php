<?php

namespace ArsoftModules\MasterItem\Controllers;

use ArsoftModules\MasterItem\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        $listItems = Item::get();
        return $listItems;
    }

    public function store()
    {
        $newData = new Item();
        $newData->name = request()->name ?? '-';
        $newData->sku = request()->sku ?? '-';
        $newData->save();

        return $newData;
    }

    public function show($id)
    {
        return Item::find($id);
    }

    public function update($id)
    {
        $data = Item::where('id', $id)
            ->firstOrFail();
        $data->name = request()->name ?? '-';
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        $data = Item::where('id', $id)->delete();
    }
}