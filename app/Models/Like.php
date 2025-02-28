<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id'];

    /**
     * Get the user that owns the Like
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


   /**
    * Get the user that owns the Like
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function post(): BelongsTo
   {
       return $this->belongsTo(Post::class);
   }
}
