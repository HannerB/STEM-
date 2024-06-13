<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'state',
        'slug',
        'url',
        'date_of_the_new_story',
    ];

    /**
     * Activate the news.
     */
    public function activate()
    {
        $this->update(['state' => 1]);
    }

    /**
     * Deactivate the news.
     */
    public function deactivate()
    {
        $this->update(['state' => 0]);
    }

    /**
     * Get formatted news date.
     *
     * @return string
     */
    public function formattedNewsDate()
    {
        // Assuming date_of_the_new_story is a date or datetime field
        return $this->date_of_the_new_story->format('Y-m-d');
    }
}
