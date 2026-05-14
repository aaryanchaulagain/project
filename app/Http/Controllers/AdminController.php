<?php

namespace App\Http\Controllers;

use App\Models\Room;

class AdminController extends Controller
{
    public function dashboard()
    {
        $rooms = Room::where('status', 'hold')->get();

        return view('admin.dashboard', compact('rooms'));
    }

    public function approveRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->update([
            'status' => 'approved',
        ]);

        return back()->with('success', 'Room approved successfully!');
    }

    public function index()
    {
        return $this->dashboard();
    }

    public function deleteRoom($id)
    {
        Room::findOrFail($id)->delete();

        return back()->with('success', 'Room deleted');
    }
}
