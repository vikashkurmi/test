<?php 
namespace App\Http\Middleware;
use Closure;
class AdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Test to see if the requesters have an ip address.
        if($request->ip() == null){
            throw new \Exception("IP ADDRESS NOT SET");   
        } 
        $country=file_get_contents('http://api.hostip.info/get_html.php?ip=' . $request->ip());
        echo $country;
        if(strpos($country, "UNITED STATES")){
           throw new \Exception("NOT FOR YOUR EYES, NSA");   
        } else {
            return redirect("index");   
        }
        
        return $next($request);
    }
}