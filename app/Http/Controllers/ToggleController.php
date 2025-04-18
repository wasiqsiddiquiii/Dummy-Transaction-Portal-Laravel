<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ToggleController extends Controller
{
    //

    public function getStatus()
    {
        $toggle = Toggle::find(1);  // Assuming you have only one record in the 'toggle' table
        return response()->json($toggle->toggle_type);  // Return 'on' or 'off'
    }

    // Update the toggle status
    public function updateStatus(Request $request)
    {
        $request->validate([
            'toggle_type' => 'required|in:on,off',
        ]);

        try {
            $toggle = Toggle::find(1); // Assuming ID 1 for this toggle
            $toggle->toggle_type = $request->toggle_type;
            $toggle->save();

            return response()->json(['success' => 'Toggle updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong while updating toggle.'], 500);
        }
    }
}
