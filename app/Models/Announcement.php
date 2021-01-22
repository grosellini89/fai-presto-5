<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable=[
        'title',
        'body',
        'category_id',
        'price',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray(){
        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'altro'=> 'annunci'
        ];

        return $array;
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }

}
