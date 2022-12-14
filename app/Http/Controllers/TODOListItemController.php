<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TODOListItemController extends Controller
{
    public function saveNewItem(Request $request)
    {
        $newItem = new ListItem;
        $newItem->title = $request->newItem;
        $newItem->description = $request->newItemDesc;
        $newItem->is_done = 0;
        $newItem->save();

        return redirect('/');
    }

    public function setDone(Request $request)
    {
        $item = ListItem::find($request->id);
        $item->is_done = 1;
        $item->save();

        return redirect('/');
    }

    public function clearList(Request $request)
    {
        return redirect('/');
    }
}
