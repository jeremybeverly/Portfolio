<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignWorkImage extends Model
{
    use HasFactory;

    protected $table = 'design_images';

    protected $fillable = ['design_work_id', 'image_path', 'caption'];

    public function designWork()
    {
        return $this->belongsTo(DesignWork::class, 'design_work_id');
    }
}
