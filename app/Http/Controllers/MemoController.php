<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoRequest;
use App\Http\Resources\MemoResource;
use App\Models\MemoList;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return MemoResource::collection(MemoList::all());
    }
    public function store(MemoRequest $memoRequest): MemoResource
    {
       $memoList = MemoList::create($memoRequest->validated());

       return new MemoResource($memoList);
    }
    public function destroy($id){
        return MemoList::destroy($id);
    }
}
