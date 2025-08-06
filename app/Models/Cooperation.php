<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Cooperation extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;

    protected $appends = ['hashid'];
    protected $guarded = [];

    public function cooperationField()
    {
        return $this->belongsTo(CooperationField::class);
    }
    public function cooperationType()
    {
        return $this->belongsTo(CooperationType::class);
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
