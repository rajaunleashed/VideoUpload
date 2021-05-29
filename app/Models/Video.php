<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
      'title', 'description', 'tags', 'file_path', 'conversion_status'
    ];

    public function getTagsAttribute($value)
    {
        if (!is_null($value) && !empty($value))
        {
            $tags = explode(',', $value);
            return $tags;
        }

        return $value;
    }
}
