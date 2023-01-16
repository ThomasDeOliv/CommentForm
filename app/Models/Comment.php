<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Representation of the comments entity
 */
class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $table = 'form_comments.comments';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nickname', 'picture_path', 'creation_datetime', 'comment', 'note', 'person_id' ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
