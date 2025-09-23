<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class BookingController extends Controller
{

    // public function GetRooms () {

    //         return view('available-rooms');
    //     }

    public function checkAvailability(Request $request)
    {
        $checkin  = $request->checkin_date;
        $checkout = $request->checkout_date;
        $adults   = $request->adults;
        $children = $request->children;

        // Step 1: Get room types that fit guest requirements
        $roomTypes = RoomType::where('max_adults', '>=', $adults)
            ->where('max_children', '>=', $children)
            ->get();

        // Step 2: Filter room types by actual availability
        $availableTypes = $roomTypes->filter(function ($type) use ($checkin, $checkout) {
            // At least one room of this type must be available
            return $type->rooms->contains(function ($room) use ($checkin, $checkout) {
                $overlap = $room->reservations()
                    ->where(function ($query) use ($checkin, $checkout) {
                        $query->whereBetween('check_in_date', [$checkin, $checkout])
                            ->orWhereBetween('check_out_date', [$checkin, $checkout])
                            ->orWhere(function ($q) use ($checkin, $checkout) {
                                $q->where('check_in_date', '<=', $checkin)
                                    ->where('check_out_date', '>=', $checkout);
                            });
                    })->exists();

                return !$overlap;
            });
        });

        return view('available-rooms', compact('availableTypes', 'checkin', 'checkout', 'adults', 'children'));
    }
}
