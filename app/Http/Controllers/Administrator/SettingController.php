<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    
    public function show()
    {
        $fieldData = Setting::all();
        $settings = array();
        foreach ($fieldData as $key => $value) {
            $settings[$value->key] = $value->value;
        }
        return view('administrator.settings.show',compact('settings'));
    }

    public function general()
    {
        $envSettings = [
            'APP_NAME' =>env("APP_NAME"),
            'APP_ENV' =>env("APP_ENV"),
            'APP_DEBUG' =>env("APP_DEBUG"),
            'MAIL_MAILER' =>env("MAIL_MAILER"),
            'MAIL_DRIVER' =>env("MAIL_DRIVER"),
            'MAIL_HOST' =>env("MAIL_HOST"),
            'MAIL_PORT' =>env("MAIL_PORT"),
            'MAIL_USERNAME' =>env("MAIL_USERNAME"),
            'MAIL_PASSWORD' =>env("MAIL_PASSWORD"),
            'MAIL_ENCRYPTION' =>env("MAIL_ENCRYPTION"),
            'MAIL_FROM_ADDRESS' =>env("MAIL_FROM_ADDRESS"),
            'MAIL_FROM_NAME' =>env("MAIL_FROM_NAME"),
        ];
        return view('administrator.settings.general',compact('envSettings'));
    }

    public function save(Request $request)
    {
        //
        try {
            $data = $request->all();
            unset($data['_token']);

            // $path = base_path('.env');
            // $file = file_get_contents($path);

            // if (file_exists($path)) {
            //     file_put_contents($path, str_replace('MAIL_MAILER=smtp', 'MAIL_MAILER=sendmail', $file));
            // }

            foreach($data as $key => $value){
                $setting = Setting::where('key', $key);    
                if($setting->exists()){
                    $setting->update(array("key"=>$key,"value"=>$value));  
                } else {
                    $setting->create(array("key"=>$key,"value"=>$value)); 
                }

            }
            return redirect()->back()->with('message', 'Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }

    }

    public function saveEnv(Request $request)
    {
        //
        try {
            $data = $request->all();
            unset($data['_token']);

            $path = base_path('.env');
            if (file_exists($path)) {
                foreach ($data as $key => $value) {
                    file_put_contents($path, str_replace(
                        $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
                    ));
                }
            }
            return redirect()->back()->with('message', 'Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }

    }

}
