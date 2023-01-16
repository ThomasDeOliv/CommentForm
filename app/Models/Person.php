<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Representation of the persons entity
 */
class Person extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $table = 'form_comments.people';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [ 'email', 'creation_datetime' ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
