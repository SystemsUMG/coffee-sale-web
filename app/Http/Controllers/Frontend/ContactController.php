<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settingsQuery = Setting::get();
        $settings = [];

        foreach ($this->settings_key as $key => $settings_key) {
            $settings[$key] = [
                'type' => $settings_key,
                'links' => []
            ];
        }

        $settingsQuery->each(function ($setting) use (&$settings) {
            switch ($setting->key) {
                case 1:
                    $settings[1]['icon'] = '<i class="text-center fs-1 bi bi-facebook"></i>';
                    $settings[1]['links'][$setting->id] = [
                        'name' => $setting->name,
                        'url' => $setting->value
                    ];
                    break;
                case 2:
                    $settings[2]['icon'] = '<i class="text-center fs-1 bi bi-instagram"></i>';
                    $settings[2]['links'][$setting->id] = [
                        'name' => $setting->name,
                        'url' => $setting->value
                    ];
                    break;
                case 3:
                    $settings[3]['icon'] = '<i class="text-center fs-1 bi bi-twitter"></i>';
                    $settings[3]['links'][$setting->id] = [
                        'name' => $setting->name,
                        'url' => $setting->value
                    ];
                    break;
                case 4:
                    $settings[4]['icon'] = '<i class="text-center fs-1 bi bi-tiktok"></i>';
                    $settings[4]['links'][$setting->id] = [
                        'name' => $setting->name,
                        'url' => $setting->value
                    ];
                    break;
                case 5:
                    $settings[5]['icon'] = '<i class="text-center fs-1 bi bi-envelope-fill"></i>';
                    $settings[5]['links'][$setting->id] = [
                        'name' => $setting->name,
                        'url' => $setting->value
                    ];
                    break;
                case 6:
                    $settings[6]['icon'] = '<i class="text-center fs-1 bi bi-telephone-fill"></i>';
                    $settings[6]['links'][$setting->id] = [
                        'name' => $setting->name,
                        'url' => $setting->value
                    ];
                    break;
            }
        });
        return view('frontend.pages.contact', [
            'settings' => $settings
        ]);
    }
}
