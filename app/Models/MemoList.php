<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 */
class MemoList extends Model
{
    use HasFactory;
    protected $table ='MemoList';
    protected $fillable = ['title'];
}
