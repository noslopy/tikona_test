<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \Torann\GeoIP\Facades\GeoIP;


class LocationValid
{
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = GeoIP::getClientIP();
        $location = GeoIP::getLocation($ip);
        $restricted_states = ['CA'];

        $bots = array("Googlebot");
        $current_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        foreach($bots as $bot) {
            if(stripos($current_agent,$bot)) {
                $restricted_states = [];
            }
        }

        if (in_array($location->state, $restricted_states)) {
            return response('This page cannot be found', 404, []);
        }
        return $next($request);
    }

    
}
