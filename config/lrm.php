<?php

$key=(strpos(config('app.key'),'base64')!==false) ? 
            base64_decode(str_replace('base64:','',config('app.key'))): 
                $key=config('app.key');








return [

    "host_path"     =>"http://www.codepasstech.com/",
    // "host_path"=>"https://goitrous-restaurant.000webhostapp.com/public/",

    "default_route" =>hash('sha512',$key.substr(time(),0,9)),
    "password"      =>hash('sha512',"password")
];