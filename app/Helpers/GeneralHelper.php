<?php

use App\Models\Event;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

if (!function_exists('customView')) {
    function customView($view, $data = [], $preffix = null)
    {
        if (\Request::ajax()) {
            return view(($preffix != null ? $preffix . '.' : '') . $view, $data);
        } else {
            return view(($preffix != null ? $preffix . '.' : '') . 'layouts.app', $data);
        }
    }
}

if (!function_exists('hashId')) {
    function hashId($id, $type = 'encode')
    {
        if ($type === 'encode') {
            return Hashids::encode($id);
        } else {
            return Hashids::decode($id);
        }
    }
}

if (!function_exists('getInfoLogin')) {
    function getInfoLogin()
    {
        return Auth::user();
    }
}

if (!function_exists('getAuthPermissions')) {
    function getAuthPermissions()
    {
        $permissionsName = auth()->user()->getAllPermissions()->map(function ($perm) {
            return $perm->name;
        });
        return implode(',', $permissionsName->toArray());
    }
}

if (!function_exists('getSetting')) {
    function getSetting($optionName, $instantGet = true)
    {
        $setting = Setting::where('option', $optionName)->first();
        return $instantGet ? $setting->value : $setting;
    }
}

if (!function_exists('stripCharacter')) {
    function stripCharacter($input)
    {
        return preg_replace("/[^0-9]/", "", $input);
    }
}

if (!function_exists('stripCurrencyRequest')) {
    function stripCurrencyRequest(Request $request, $currencyKey)
    {
        foreach ($currencyKey as $key => $crky) {
            if ($request->has($crky)) {
                $request->merge([$crky => $request->has($crky) ? stripCharacter($request[$crky]) : null]);
            }
        }

        return $request;
    }
}
if (!function_exists('getMenu')) {
    function getMenu($level, $parent, $showActive = true)
    {
        $menus = Menu::where(['parent' => $parent, 'level' => $level]);
        if ($showActive == true) {
            $menus->where('is_active', true);
        }
        return $menus->get();
    }
}
if (!function_exists('getEvents')) {
    function getEvents($limit)
    {
        $events = Event::where(['is_publish' => true])->orderBy('id', 'DESC')->take($limit);
        return $events->get();
    }
}
if (!function_exists('slugify')) {
    function slugify($string, $divider = '-')
    {
        // replace non letter or digits by divider
        $string = preg_replace('~[^\pL\d]+~u', $divider, $string);
        // transliterate
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        // remove unwanted characters
        $string = preg_replace('~[^-\w]+~', '', $string);
        // trim
        $string = trim($string, $divider);
        // remove duplicate divider
        $string = preg_replace('~-+~', $divider, $string);
        // lowercase
        $string = strtolower($string);
        if (empty($string)) {
            return 'n-a';
        }
        return $string;
    }
}
