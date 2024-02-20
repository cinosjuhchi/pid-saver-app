<?php

namespace App\Models;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $fillable = ['title', 'filename', 'status', 'place_folder_id'];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class, 'place_folder_id');
    }

}
