<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class TODOAPI extends Controller
{
    public function index()
    {
        $listItems = ListItem::all();
        return response()->json($listItems);
    }

    private function checkAuth()
    {
        csrf_token();
    }
}
