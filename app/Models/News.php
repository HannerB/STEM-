<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsImage;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'state',
        'slug',
        'date_of_the_new_story',
    ];

    /**
     * Activate the news.
     */
    public function activate() {
        $this->update(['state' => 1]);
    }

    /**
     * Deactivate the news.
     */
    public function deactivate() {
        $this->update(['state' => 0]);
    }

    /**
     * Get formatted news date.
     *
     * @return string
     */
    public function formattedNewsDate() {
    if ($this->date_of_the_new_story) {
        return $this->date_of_the_new_story->format('Y-m-d');
    }
    return null;
    }
    public function images() {
        return $this->hasOne(NewsImage::class)->where('is_main', true);
    }
}
