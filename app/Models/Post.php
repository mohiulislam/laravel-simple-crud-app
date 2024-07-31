<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
    ];

    public static function updateOrCreate(array $attributes, array $values)
    {
        return self::updateOrInsert($attributes, $values);
    }
}
