<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id', 'title', 'description', 'venue',
        'date', 'price', 'max_attendees'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

 
}
