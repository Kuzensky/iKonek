<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Session 1: Private user channel
Broadcast::channel('user.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

// Session 2: Public fundraiser channel
Broadcast::channel('fundraiser.{fundraiserId}', function () {
    return true;
});
