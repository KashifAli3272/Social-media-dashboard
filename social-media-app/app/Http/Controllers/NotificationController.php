<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

public function index()
{
    $notifications = Notification::latest()->get();
    return view('notification', compact('notifications'));
}

public function markAsRead(Notification $notification)
{
    $notification->update(['is_read' => true]);
    return back();
}

public function destroy(Notification $notification)
{
    $notification->delete();
    return back()->with('success', 'Notification deleted.');
}

}
