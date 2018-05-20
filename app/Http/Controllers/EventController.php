<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use App\BusinessRules\HallIsAvailable;

class EventController extends Controller
{    
    public function delete(Event $event) 
    {
        $event->delete();

        return response()->json(null, 204);
    }

    public function index() 
    {
        return Event::all();
    }

    public function show(Event $event) 
    {
        return $event;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'date_event' => 'required|date',
            'start_hour' => 'required|date_format:H:i',
            'finish_hour' => 'required|date_format:H:i|after:time_start'
        ]);
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles('administrator');
        
        $eventInsert = $request->all();
        $request->validate([
            'date_event'        => 'required|date_format:Y-m-d',
            'start_hour'        => 'required|date_format:H:i',
            'finish_hour'       => 'required|date_format:H:i|after:start_hour',
            'hall_id'           => 'required|integer|exists:mysql.halls,id',
            'speaker_id'        => 'required|integer|exists:mysql.speakers,id',
            'presentation_id'   => 'required|integer|exists:mysql.presentations,id'
        ]);

        $this->business([
            new HallIsAvailable($request->hall_id, $request->date_event, $request->start_hour, $request->finish_hour)
        ]);

        //$event = Event::create($request->all());
        
        return response()->json(null, 201);
    }

    public function update(Request $request, Event $event) 
    {
        $event->update($request->all());
        return response()->json($event, 200);
    }
}
