<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Importez la façade Storage

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'path'];

    /**
     * Accesseur pour obtenir l'URL complète de l'image stockée.
     * Cela permet d'accéder à l'image via $image->url.
     */
    public function getUrlAttribute(): string
    {
        return Storage::url($this->path); // [1]
    }
}