<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function inbox()
    {
        $messages = Message::latest()->get();
        return view('messages', compact('messages'));
    }
}

