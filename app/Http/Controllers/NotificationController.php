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

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);

        if (!$notification) {
            abort(404);
        }

        $notification->markAsRead();

        return redirect()->back()->with('success', 'Notification marked as read');
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'All notifications marked as read');
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
