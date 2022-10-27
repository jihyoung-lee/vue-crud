<?php

namespace App\Http\Controllers;

use App\Models\MemoList;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $memoList = MemoList::all();
        return response()->json([
            'memoList' => $memoList
        ], 200);
    }
    public function store(): \Illuminate\Http\JsonResponse
    {
        $validated = request()->validate(
            ['title'=> 'required',
            ] );

        $memoList = MemoList::create($validated);

        return response()->json([
            'memoList' => $memoList,
        ], 200);
    }
    public function destroy($id){
        return MemoList::destroy($id);
    }
}
