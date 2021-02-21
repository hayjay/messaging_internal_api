<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message_subject', 'message_body', 'author_id'];

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }
}
