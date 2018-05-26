<?php

namespace Exc\Weather\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['status'];
    
    public static function getStatus()
    {
        $notification = Notification::orderby('created_at', 'desc')->first();
        
        $result = array(
            'status' => $notification->status
        );
        
        switch ($notification->status) {
            case 'not_notified' :
                $result['message'] = 'No notifications sent';
                break;
            case 'wind_up' :
                $result['message'] = 'Wind speed up @ ' . $notification->created_at;
                break;
            case 'wind_down' :
                $result['message'] = 'Wind speed down @ ' . $notification->created_at;
                break;
        }
        
        return json_decode(json_encode($result), FALSE);
    }
}
