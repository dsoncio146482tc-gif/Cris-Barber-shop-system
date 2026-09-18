<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarberController extends Controller
{
    public function updateStatus(Request $request, string $barber)
    {
        abort_unless($request->user()->role === 'admin', 403);
        $data = $request->validate(['status' => ['required', 'in:active,inactive,on_leave']]);
        DB::table('barbers')->where('id', $barber)->update(['status' => $data['status'], 'updated_at' => now()]);
        return back()->with('status', 'Barber status updated.');
    }
}
