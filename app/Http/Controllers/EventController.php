<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{

    public function list(): View
    {
        return view('events.list', [
            'events' => Event::all()
        ]);
    }

    public function details($id): View
    {
        $event = Event::query()->findOrFail($id);
        return view('events.details', [
            'event' => $event,
            'user' => $event->user,
        ]);
    }

    public function addEventForm(): View
    {
        return view('events.create', [
            'users' => User::all(),
        ]);
    }

    public function addEvent(Request $request): RedirectResponse
    {
        $valid = $request->validate([
            'title' => ['required', 'min:3', 'string'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'notes' => ['required', 'min:3'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
        ]);
        $event = Event::create([
            'title' => $valid['title'],
            'user_id' => $valid['user_id'],
            'notes' => $valid['notes'],
            'dt_start' => $valid['date_start'],
            'dt_end' => $valid['date_end'],
        ]);
        $event->save();
        return to_route('events');
    }

    public function editEventForm($id): View
    {
        return view('events.create', [
            'event' => Event::query()->findOrFail($id),
            'users' => User::all(),
        ]);
    }

    public function editEvent($id, Request $request): RedirectResponse
    {
        $valid = $request->validate([
            'title' => ['required', 'min:3', 'string'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'notes' => ['required', 'min:3'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
        ]);

        $event = Event::query()->findOrFail($id);
        $event->update([
            'title' => $valid['title'],
            'user_id' => $valid['user_id'],
            'notes' => $valid['notes'],
            'dt_start' => $valid['date_start'],
            'dt_end' => $valid['date_end'],
        ]);
        return to_route('events');
    }

    public function deleteEvent($id): RedirectResponse
    {
        $event = Event::query()->findOrFail($id);
        $event->delete();
        return to_route('events');
    }

}
