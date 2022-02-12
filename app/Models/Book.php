<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use HasFactory;

    use Sortable;

    public $sortable = ['id', 'title', 'description', 'author_id' ] ;

    public function bookAuthor() {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
