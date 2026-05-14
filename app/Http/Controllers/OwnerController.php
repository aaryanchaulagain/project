<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function create($id)
    {
        return view('pages.ownerregistration', compact('id'));
    }

    public function saveExtra(Request $request)
    {
        $request->validate([
            'room_type' => 'required',
            'rooms_available' => 'required|numeric',
        ]);

        $user = User::findOrFail($request->registration_id);

        $user->update([
            'room_type' => $request->room_type,
            'rooms_available' => $request->rooms_available,
        ]);

        return redirect('/')->with('success', 'Owner registered successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'rooms_available' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/rooms'), $imageName);
        }

        Room::create([
            'owner_id' => auth()->id(),
            'name' => $request->name,
            'type' => $request->type,
            'rooms_available' => $request->rooms_available,
            'price' => $request->price,
            'status' => 'hold',
            'image' => $imageName,
        ]);

        return redirect()->route('owner.room.index')->with('success', 'Room uploaded successfully!');
    }
}

