<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add HasFactory
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; // Use HasFactory

    protected $fillable = [
        'name',
        'description',
        'image',
        'project_type_id', // Add project_type_id to fillable
    ];

    /**
     * Get the project type that owns the project.
     */
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
