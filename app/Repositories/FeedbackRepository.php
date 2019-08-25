<?php
namespace App\Repositories;

use App\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackRepository
{
    public static function create(array $data)
    {
        $feedback = new Feedback();
        $feedback->score = $data['score'];
        $feedback->message = $data['message'];
        if (Auth::check()) {
            $feedback->user_id = Auth::id();
        }
        $feedback->save();
    }
}