<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    use AddEdit;

    protected $fillable = [
        'format_id','title','description','duration','file','image', 'certificate_image', 'law_image', 'platform'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    public function setGenres($ids)
    {
        if($ids == null or $ids == []){ return; }
        $ids = array_filter($ids);
        $this->genres()->sync($ids);
    }

    public function format()
    {
        return $this->belongsTo(FilmFormat::class)->withDefault(['title'=>'<span class="text-danger">нет данных</span>']);
    }

    public function rent(){
        return $this->belongsTo(FilmRent::class, 'rent_id', 'rent');
    }

    public function getImage()
    {
        $imagePath = ($this->image) ? $this->image : 'images/no-image-available.png';

        return '/storage/' . $imagePath;

    }

    public function getFile()
    {
        $filePath = ($this->file) ? $this->file : 'videos/no-image-available.png';

        return '/storage/' . $filePath;

    }

}
