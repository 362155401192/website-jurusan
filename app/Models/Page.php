<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Page extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;

    protected $appends = ['hashid'];
    protected $guarded = [];

    // public function page()
    // {
    //     return $this->hasMany(Page::class);
    // }

    public function menuPage()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
