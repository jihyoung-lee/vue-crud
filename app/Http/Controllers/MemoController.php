<?php

namespace App\Http\Controllers;

use App\Models\MemoList;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function store()
    {
        $validated = request()->validate(
            ['title'=> 'required',
            ] );

        $memoList = MemoList::create($validated);

        return response()->json([
            'memoList' => $memoList,
        ], 200);
    }
}
