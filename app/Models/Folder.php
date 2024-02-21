<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;
    
    protected $table = 'folders';
    protected $fillable = ['title', 'slug','status', 'parent_folder_id'];
    public function parentFolder(): BelongsTo
    {
        return $this->belongsTo(Folder::class, 'parent_folder_id');
    }

    public function subfolders(): HasMany
    {
        return $this->hasMany(Folder::class, 'parent_folder_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'place_folder_id');
    }

}
