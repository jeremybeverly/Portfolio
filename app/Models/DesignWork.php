<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignWork extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'description', 'cover_image','design_work_type_id'];

    public function images()
    {
        return $this->hasMany(DesignWorkImage::class, 'design_work_id');
    }

    public function designWorkType()
    {
        return $this->belongsTo(DesignWorkType::class);
    }
}
