<?php

use Illuminate\Support\Facades\Cache;

function getParentShowOf($param){
$route=str_replace('admin.','',$param);
return Cache::get('admin_side_menu')->where('as',$route)->first();
}
