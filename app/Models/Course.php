<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['test'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function test()
    { 
        return $this->belongsTo(Test::class);
    }

    public function users() 
    {
        return $this->belongsToMany(User::class, 'user_courses');
    }

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'ratings')->withPivot('rating', 'review');;
    }

    public function rate()
    {
        $total_value = $this->ratings()->sum('rating');

        $count_review = $this->ratings()->count();

        if ($total_value !== 0 && $count_review !== 0) {
            
            $rating_result = number_format($total_value / $count_review, 1);
    
            return $rating_result;
        }

        return 0;

    }

    protected static function booted()
    {
        static::updated(function (Course $course) {

            if ($course->isDirty('total_lessons')) {
            
                $newTotalLessons = $course->total_lessons;
            
                $course->lessons()->where('order', '>', $newTotalLessons)->update(['order' => null]);
            }

        });
        
        static::deleting(function (Course $course) {

            $course->ratings()->detach();

            $course->users()->detach();

            $course->lessons()->delete();

        });
    }
}
