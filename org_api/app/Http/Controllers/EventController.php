<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\ActivityLog;

class EventController extends Controller
{

/*public function index(){
  $tenant=App('currentTenant');

  $event=$tenant->events()->get();
  return response()->json($events);
}*/



    public function store(Request $request,  $org)
{
   
    $organization=Organization::where('slug',$org)->firstOrFail();
    $data = $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'venue' => 'required|string',
        'date' => 'required|date',
        'price' => 'required|numeric',
        'max_attendees' => 'required|integer',
    ]);

    $event = $organization->events()->create($data);

    ActivityLog::create([
        'user_id' => auth()->id(),
        'organization_id' => $organization->id,
        'event_id' => $event->id,
        'action' => 'created',
        'description' => "Created event {$event->title}",
    ]);

    return response()->json($event, 201);
}

protected function authorizeOrg(Organization $organization)
{
    if (auth()->user()->organization_id !== $organization->id) {
        abort(403, 'Unauthorized');
    }
}


}
