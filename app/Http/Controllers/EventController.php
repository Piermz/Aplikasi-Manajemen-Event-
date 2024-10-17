<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

public function index(Request $request)
{
    $query = Event::query();

    // Apply filter
    if ($request->filter === 'upcoming') {
        $query->where('tanggal', '>=', now());
    } elseif ($request->filter === 'past') {
        $query->where('tanggal', '<', now());
    }

    // Apply search
    if ($request->has('search')) {
        $search = $request->search;
        $query->where('nama', 'like', "%{$search}%");
    }

    $events = $query->latest()->paginate(10);
    return view('events.index', compact('events'));
}


public function create()
{
    return view('events.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'foto_poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('foto_poster')) {
        $path = $request->file('foto_poster')->store('posters', 'public');
        $validated['foto_poster'] = $path;
    }

    Event::create($validated);

    return redirect()->route('events.index')->with('success', 'Event created successfully.');
}

public function edit(Event $event)
{
    return view('events.edit', compact('event'));
}
public function show(Event $event)
{
    return view('events.show', compact('event'));
}
public function update(Request $request, Event $event)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'foto_poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('foto_poster')) {
        // Delete the old image
        if ($event->foto_poster) {
            Storage::disk('public')->delete($event->foto_poster);
        }

        $path = $request->file('foto_poster')->store('posters', 'public');
        $validated['foto_poster'] = $path;
    }

    $event->update($validated);

    return redirect()->route('events.index')->with('success', 'Event updated successfully.');

}

public function destroy(Event $event)
{
    // Delete the associated image file if it exists
    if ($event->foto_poster) {
        Storage::disk('public')->delete($event->foto_poster);
    }

    // Delete the event
    $event->delete();

    return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
}
}
