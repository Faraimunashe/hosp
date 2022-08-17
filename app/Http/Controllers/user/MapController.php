<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class MapController extends Controller
{
    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    public function index(Request $request)
    {
        //$ip = $request->ip(); //Dynamic IP address */

        //$ip = '197.221.232.186'; /* Static IP address */
        $realIP = file_get_contents("http://ipecho.net/plain");

        $info = Location::get($realIP);
        if($info == false){
            return redirect()->back()->with("error","network error! make sure you are connected");
        }
        $hospitals = Hospital::all();
        $lowest_cords = "";
        $lowest_distance = 0;

        foreach($hospitals as $hospital)
        {
            $cords = explode (",", $hospital->cordidates);

            $distance = getDistanceBetweenPointsNew($info->latitude, $info->longitude, $cords[0], $cords[1]);
            if($lowest_distance == 0){
                $lowest_distance = $distance;
                $lowest_cords = $hospital->cordidates;
            }
            if($distance < $lowest_distance){
                $lowest_distance = $distance;
                $lowest_cords = $hospital->cordidates;
            }

        }

        if($lowest_cords == "" || $lowest_distance == 0){
            return redirect()->back()->with("error","could not find facility latitude and longitudes");
        }

        return view('user.near-hospital',[
            'hos_cords' => $lowest_cords,
            'info' => $info
        ]);
    }
}
