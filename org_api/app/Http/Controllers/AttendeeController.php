<?php

namespace App\Http\Controllers;
use App\Models\Organization;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function store(Request $request, Organization $organization)
{
      
    $data = $request->validate([
        'event_id' => 'required|exists:events,id',
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
    ]);

    $event = Event::where('id', $data['event_id'])
        ->where('organization_id', $organization->id)
        ->firstOrFail();

   return $event->attendees()->create($data);
    
}

}
