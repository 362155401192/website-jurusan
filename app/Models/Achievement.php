<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;
use Illuminate\Support\Str;

class Achievement extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;

    protected $appends = ['hashid'];

    // Semua kolom bisa diisi melalui mass-assignment
    protected $guarded = [];

    // Cast tanggal otomatis ke Carbon instance
    protected $casts = [
        'published_at' => 'datetime',
        'date' => 'date',
        'is_external_link' => 'boolean',
        'is_publish' => 'boolean',
    ];


    protected static function booted()
    {
        static::creating(function ($achievement) {
            if (empty($achievement->slug)) {
                $achievement->slug = Str::slug($achievement->title);
            }
        });

        static::updating(function ($achievement) {
            if (empty($achievement->slug)) {
                $achievement->slug = Str::slug($achievement->title);
            }
        });
    }
    /**
     * === RELASI ===
     */

    public function achievementType()
    {
        return $this->belongsTo(AchievementType::class);
    }

    public function achievementLevel()
    {
        return $this->belongsTo(AchievementLevel::class);
    }

    public function achievementProgramStudi()
    {
        return $this->belongsTo(AchievementProgramStudi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    /**
     * === ACCESSOR TAMBAHAN (Opsional) ===
     */

    // Mendapatkan URL lengkap ke file sertifikat (jika disimpan sebagai filename)
    public function getLinkSertifikatUrlAttribute()
    {
        return $this->link_sertifikat ? asset('storage/sertifikat/' . $this->link_sertifikat) : null;
    }

    // Mendapatkan URL gambar jika ingin full path
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/achievements/' . $this->image) : asset('storage/achievements/default.png');
    }
}
