<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\User;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description', 'image', 'user_id'];

    public function author() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

        /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray()
    {
        return array_merge($this->toArray(),[
            'id' => (string) $this->id,
            'user_id' => (string) $this->user_id,
            'created_at' => $this->created_at->timestamp,
        ]);
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'articles_index';
    }
}
