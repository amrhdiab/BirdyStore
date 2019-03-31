<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Message;
use App\Review;
use App\Order;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::first();
        //get unread user messages for the navbar
        $messages = Message::where('is_read',0)->take(4)->orderBy('created_at','desc')->get();
        //get all unread messages count for the navbar
        $messagesCount = Message::where('is_read',0)->count();
        //get the count of orders with waiting status for sidebar menu
        $waitingOrders = Order::where('status','Waiting')->count();
        //get the count of reviews with waiting status for sidebar menu
        $waitingReviews = Review::where('status','Waiting')->count();
        return view('admin.settings.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }


    public function store(Request $request)
    {
        $settings = Setting::first();
        $rules = [
            'website_name'    => 'required|string|min:5|max:20',
            'contact_number'  => 'required|numeric',
            'contact_email_1' => 'required|email',
            'contact_email_2' => 'required|email',
            'facebook'        => 'required',
            'twitter'         => 'required',
            'google'          => 'required',
            'dribble'         => 'required',
            'slogan'          => 'required',
            'address'         => 'required',
            'lat'             => 'required|numeric',
            'lng'             => 'required|numeric',
            'about_us'        => 'required',
            'logo'            => 'required|image|max:1999',
            'logo2'            => 'required|image|max:1999',
        ];

        $errors_output = [];
        $success_output = '';
        $validation = \Validator::make($request->all(), $rules);
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $errors_output[] = $messages[0];
            }
        } else
        {
            if ($request->hasFile('logo'))
            {
                $fileNameWithExt = $request->file('logo')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('logo')->getClientOriginalExtension();
                $fileNameToStore = $fileName.'.'.$ext;
                $request->file('logo')->storeAs('public/settings', $fileNameToStore);
                \Storage::delete('/public/settings/' . $settings['logo']);
            }else{
                $fileNameToStore = $settings['logo'];
            }

            if ($request->hasFile('logo2'))
            {
                $fileNameWithExt = $request->file('logo2')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('logo2')->getClientOriginalExtension();
                $fileNameToStore2 = $fileName.'.'.$ext;
                $request->file('logo2')->storeAs('public/settings', $fileNameToStore2);
                \Storage::delete('/public/settings/' . $settings['logo2']);
            }else{
                $fileNameToStore2 = $settings['logo2'];
            }

            $settings->update([
                'website_name'    => $request['website_name'],
                'contact_number'  => $request['contact_number'],
                'contact_email_1' => $request['contact_email_1'],
                'contact_email_2' => $request['contact_email_2'],
                'facebook'        => $request['facebook'],
                'twitter'         => $request['twitter'],
                'google'          => $request['google'],
                'dribble'         => $request['dribble'],
                'slogan'          => $request['slogan'],
                'address'         => $request['address'],
                'lat'             => $request['lat'],
                'lng'             => $request['lng'],
                'about_us'        => $request['about_us'],
                'logo'            => $fileNameToStore,
                'logo2'            => $fileNameToStore2,
            ]);

            $success_output = 'Settings updated successfully.';
        }
        return response()->json(['error'=>$errors_output , 'success'=>$success_output ,'settings'=>$settings]);
    }
}
