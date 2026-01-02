<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function create()
    {
        return view('owner.room_create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'rooms_available' => 'required|integer',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validate image
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/rooms'), $imageName);
    }

    Room::create([
        'owner_id' => auth()->id(),
        'name' => $request->name,
        'type' => $request->type,
        'rooms_available' => $request->rooms_available,
        'price' => $request->price,
        'status' => 'hold', // temporarily hold until admin approves
        'image' => $imageName, // save image filename to DB
    ]);

    return redirect()->route('owner.room.index')->with('success', 'Room uploaded successfully!');
}




    public function index()
    {
        $rooms = Room::where('owner_id', auth()->id())->get();
        return view('owner.room_index', compact('rooms'));
    }
    public function status() {
    $rooms = Room::where('owner_id', auth()->id())->get();
    return view('owner.room_status', compact('rooms'));
}
public function edit($id) {
    $room = Room::where('owner_id', auth()->id())->findOrFail($id);
    return view('owner.room_edit', compact('room'));
}

public function update(Request $request, $id) {
    $request->validate([
        'name' => 'required',
        'type' => 'required',
        'rooms_available' => 'required|integer',
        'price' => 'required|numeric',
    ]);

    $room = Room::where('owner_id', auth()->id())->findOrFail($id);
    $room->update([
        'name' => $request->name,
        'type' => $request->type,
        'rooms_available' => $request->rooms_available,
        'price' => $request->price,
    ]);

    return redirect()->route('owner.room.index')->with('success', 'Room updated successfully!');
}

public function destroy($id) {
    $room = Room::where('owner_id', auth()->id())->findOrFail($id);
    $room->delete();
    return redirect()->route('owner.room.index')->with('success', 'Room deleted successfully!');
}

public function servicePage()
{
    $rooms = Room::where('status', 'approved')->get();
    return view('pages.room', compact('rooms'));
}

}



