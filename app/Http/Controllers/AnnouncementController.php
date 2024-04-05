<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Notifications\AnnouncementCreated;
use Illuminate\Support\Facades\Notification;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
          $annoucement = Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
          ]);

          //sending to user
       //   $user = User::first();
       //   $user->notify(new AnnouncementCreated($annoucement));

          //sending to email
     //      Notification::route('mail', ['watsonanyitike06@gmail.com' => 'Anywat Tson Jr.'])->notify(new AnnouncementCreated($annoucement));

          //sending to multiple emails
       //   $receipients = [
        //    'watsonanyitike06@gmail.com' => 'Anywat Tson Jr.',
       //     'glory@example.com' => 'Glory Mushi'
      //    ];

        //  Notification::route('mail', $receipients)->notify(new AnnouncementCreated($annoucement));

        //sending to multiple users
        $users = User::all();
        Notification::route('mail', $users)->notify(new AnnouncementCreated($annoucement));


          return response()->json($annoucement);
    }
}
