<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kawankoding\Fcm\Fcm;

class NotificationController extends Controller
{
    public function create(Request $request)
    {
        return $this->renderPage($request, 'notification.create');
    }

    public function store(Request $request)
    {
        $recipients = ['fvBAQoqMNRE:APA91bFbyyW0_lLCDjbchbg8evSba1nFUWcxPkRfz5qBW8oS6IqyeTYz0rq6R0XkSLixDLLEc1IoiyHptgIKq7rtEjEYkOlNLpIsX-cca_RbE1yQK1VnB1-6k3EDb8MRWJVJaHPJk9oH'];
        $responseArr = fcm()
            ->to($recipients)
            ->priority('normal')
            ->timeToLive(0)
            ->notification([
                'title' => $request->title,
                'body' => $request->body,
            ])
            ->send();
                
        return redirect()->back();
    }

    public function topic(Request $request, $topic)
    {
        $responseArr = fcm()
        ->toTopic($topic) // $topic must an string (topic name)
        ->priority('normal')
        ->timeToLive(0)
        ->notification([
            'title' => $topic,
            'body' => 'This is a test of FCM to topic '.$topic,
        ])
        ->send();

        return $responseArr;
    }
}
