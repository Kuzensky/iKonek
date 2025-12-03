<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::forUser(auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        Notification::forUser(auth()->id())
            ->unread()
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return response()->json(['success' => true]);
    }

    public function destroy(Notification $notification)
    {
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->delete();

        return response()->json(['success' => true]);
    }

    public function getUnreadCount()
    {
        $count = Notification::forUser(auth()->id())
            ->unread()
            ->count();

        return response()->json(['count' => $count]);
    }
}
