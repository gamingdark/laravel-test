<?php

namespace Exc\Weather\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Exc\Weather\Models\Subscribtion;
use Exc\Weather\Models\Location;
use Exc\Weather\Models\Notification;
use Exc\Weather\WeatherHandler;

class WeatherController extends Controller
{
    public function info()
    {
        $data = array();
        
        $location = Location::first();
        if ($location == null) {
            $data['location'] = 'N/A';
            $data['info'] = 'N/A';
            $data['notification'] = 'N/A';
        } else {
            $data['location'] = $location->locationstring;
            $data['info'] = WeatherHandler::getWeatherData($location->locationstring);
            
            $data['notification'] = Notification::getStatus()->message;
        }
        
        $data['subscribtions'] = Subscribtion::all();
        
        return view('weather::info', $data);
    }
    
    public function location(Request $request)
    {
        $location = Location::find(1);
        
        if ($location == null) {
            Location::create($request->all());
        } else {
            $location->update($request->all());
        }
        
        Notification::create(['status' => 'not_notified']);
        
        return Redirect::to('weather');
    }
    
    public function subscribe(Request $request)
    {
        $data = $request->input();
        $exists = Subscribtion::where('email', $data['email'])->count();
        
        if ($exists == 0) {
            Subscribtion::create($data);
        }
        
        return Redirect::to('weather');
    }
    
    public function unsubscribe($id)
    {
        $subscribtion = Subscribtion::findOrFail($id);
        
        $subscribtion->delete();
        
        return Redirect::to('weather');
    }
}
