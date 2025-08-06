<?php

namespace App\Http\Controllers\Web\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\ApiController;

class SettingController extends Controller
{
    use ApiController;
    const FILE_PATH = 'storage';

    public function index()
    {

        $groupedSettings = [];
        $settings = Setting::all();

        foreach ($settings as $setting) {
            $groupedSettings[$setting->group][] = $setting;
        }

        $data = [
            'title' => 'Pengaturan',
            'settings' => $groupedSettings,
        ];

        return customView('setting.index', $data, 'backend');
    }

    public function update(Request $request)
    {
        try {
            $settingsValues = $this->proccessSettingsRequest($request);

            foreach ($settingsValues as $option => $settingValue) {
                Setting::where('option', $option)->update([
                    'value' => $settingValue
                ]);
            }

            return $this->successResponse('Berhasil mengupdate pengaturan');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    private function proccessSettingsRequest(Request $request)
    {

        $settingValues = [];
        $requests = $request->except(['_token', '_method', 'group']);

        switch ($request->group) {
            case 'general':
            case 'social':
            case 'seo':
            case 'contact':

                foreach ($requests as $option => $reqData) $settingValues[$option] = $reqData;

                break;
            case 'image':
                foreach ($requests as $option => $reqData) {

                    $optionsName = $requests->map(function ($data, $i) {
                        return $i;
                    });
                    $setting = Setting::where('option', $option)->first();
                    $path = public_path(self::FILE_PATH . '/' . 'images' . '/' . $setting->value);
                    if (File::exists($path)) File::delete($path);

                    // Move files
                    $randomName = Str::random(12) . '.' . $request->file($option)->getClientOriginalExtension();
                    $request->file($option)->move(self::FILE_PATH . '/' . 'images', $randomName);

                    $settingValues[$option] = $randomName;
                }
                break;
        }

        return $settingValues;
    }
}
