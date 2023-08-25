<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function booted() 
    {
        static::deleting(function (Test $test) {
            $test->questions()->delete();
            Course::where('test_id', $test->id)->update(['test_id' => null]);
        });
    }
}
