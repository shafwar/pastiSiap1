<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'mata_kuliah';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'mata_kuliah_id';  // Here, we're using 'mata_kuliah_id' as the primary key

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'mata_kuliah_name', // Name of the course
        'mata_kuliah_id',   // Custom primary key
        'sks',               // Number of credits
        'ruang'              // Room code (foreign key)
    ];

    // Define the relationship with the 'ruang' table (room)
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang', 'kode');  // 'ruang' field in mata_kuliah refers to 'kode' in ruang
    }

    /**
     * Override saving method to ensure the room exists.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($mataKuliah) {
            if ($mataKuliah->ruang && !Ruang::where('kode', $mataKuliah->ruang)->exists()) {
                throw new \Exception("The room does not exist.");
            }
        });
    }
}
