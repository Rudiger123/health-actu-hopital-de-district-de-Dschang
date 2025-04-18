<?php
namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

// app/Models/Tag.php
class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'color'];

    // Relation many-to-many avec les articles
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }


    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
