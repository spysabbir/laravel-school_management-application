<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DefaultSetting;
use App\Models\MailSetting;
use App\Models\SeoSetting;
use App\Models\SmsSetting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
     // Change Env Function
    public function changeEnv($envKey, $envValue)
    {
        $envFilePath = app()->environmentFilePath();
        $strEnv = file_get_contents($envFilePath);
        $strEnv.="\n";
        $keyStartPosition = strpos($strEnv, "{$envKey}=");
        $keyEndPosition = strpos($strEnv, "\n",$keyStartPosition);
        $oldLine = substr($strEnv, $keyStartPosition, $keyEndPosition-$keyStartPosition);

        if(!$keyStartPosition || !$keyEndPosition || !$oldLine){
            $strEnv.="{$envKey}={$envValue}\n";
        }else{
            $strEnv=str_replace($oldLine, "{$envKey}={$envValue}",$strEnv);
        }
        $strEnv=substr($strEnv, 0, -1);
        file_put_contents($envFilePath, $strEnv);
    }

    public function defaultSetting(){
        $defaultSetting = DefaultSetting::first();
        return view('backend.setting.default', compact('defaultSetting'));
    }

    public function defaultSettingUpdate(Request $request){
        $request->validate([
            'site_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'site_favicon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'site_name' => 'required',
            'site_url' => 'required',
            'site_timezone' => 'required',
            'site_currency' => 'required',
            'site_currency_symbol' => 'required',
            'site_main_email' => 'required',
            'site_main_phone' => 'required',
            'site_address' => 'required',
        ]);

        $this->changeEnv("APP_NAME", "'$request->site_name'");
        $this->changeEnv("APP_URL", "'$request->site_url'");
        $this->changeEnv("APP_TIMEZONE", "'$request->site_timezone'");

        $defaultSetting = DefaultSetting::first();

        $defaultSetting->update([
            'site_name' => $request->site_name,
            'site_url' => $request->site_url,
            'site_timezone' => $request->site_timezone,
            'site_currency' => $request->site_currency,
            'site_currency_symbol' => $request->site_currency_symbol,
            'site_main_phone' => $request->site_main_phone,
            'site_support_phone' => $request->site_support_phone,
            'site_main_email' => $request->site_main_email,
            'site_support_email' => $request->site_support_email,
            'site_address' => $request->site_address,
            'site_facebook' => $request->site_facebook,
            'site_twitter' => $request->site_twitter,
            'site_instagram' => $request->site_instagram,
            'site_linkedin' => $request->site_linkedin,
            'site_pinterest' => $request->site_pinterest,
            'site_youtube' => $request->site_youtube,
            'site_whatsapp' => $request->site_whatsapp,
            'site_telegram' => $request->site_telegram,
            'site_tiktok' => $request->site_tiktok,
        ]);

        // Site Logo Upload
        if($request->hasFile('site_logo')){
            if($defaultSetting->site_logo != 'default_site_logo.png'){
                unlink(base_path("public/uploads/setting_photo/").$defaultSetting->site_logo);
            }

            $manager = new ImageManager(new Driver());
            $site_logo_name = "Site-Logo".".". $request->file('site_logo')->getClientOriginalExtension();
            $image = $manager->read($request->file('site_logo'));
            $image->toJpeg(80)->save(base_path("public/uploads/setting_photo/").$site_logo_name);
            $defaultSetting->update([
                'site_logo' => $site_logo_name
            ]);
        }

        // Site Favicon Upload
        if($request->hasFile('site_favicon')){
            if($defaultSetting->site_favicon != 'default_site_favicon.png'){
                unlink(base_path("public/uploads/setting_photo/").$defaultSetting->site_favicon);
            }
            $manager = new ImageManager(new Driver());
            $site_favicon_name = "Site-Favicon".".". $request->file('site_favicon')->getClientOriginalExtension();
            $image = $manager->read($request->file('site_favicon'));
            $image->toJpeg(80)->save(base_path("public/uploads/setting_photo/").$site_favicon_name);
            $defaultSetting->update([
                'site_favicon' => $site_favicon_name
            ]);
        }

        $notification = array(
            'message' => 'Default setting updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function seoSetting(){
        $seoSetting = SeoSetting::first();
        return view('backend.setting.seo', compact('seoSetting'));
    }

    public function seoSettingUpdate(Request $request){
        $request->validate([
            'meta_title' => 'required',
            'meta_author' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'og_title' => 'required',
            'og_type' => 'required',
            'og_url' => 'required',
            'og_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'og_description' => 'required',
            'og_site_name' => 'required',
            'twitter_card' => 'required',
            'twitter_site' => 'required',
            'twitter_title' => 'required',
            'twitter_description' => 'required',
            'twitter_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'twitter_image_alt' => 'required',
        ]);

        $seoSetting = SeoSetting::first();
        $seoSetting->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_type' => $request->og_type,
            'og_url' => $request->og_url,
            'og_description' => $request->og_description,
            'og_site_name' => $request->og_site_name,
            'twitter_card' => $request->twitter_card,
            'twitter_site' => $request->twitter_site,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
            'twitter_image_alt' => $request->twitter_image_alt,
        ]);

        // Og Image Upload
        if($request->hasFile('og_image')){
            if($seoSetting->og_image != 'default_og_image.png'){
                unlink(base_path("public/uploads/setting_photo/").$seoSetting->og_image);
            }

            $manager = new ImageManager(new Driver());
            $og_image_name = "Og-Image".".". $request->file('og_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('og_image'));
            $image->toJpeg(80)->save(base_path("public/uploads/setting_photo/").$og_image_name);
            $seoSetting->update([
                'og_image' => $og_image_name
            ]);
        }

        // Twitter Image Upload
        if($request->hasFile('twitter_image')){
            if($seoSetting->twitter_image != 'default_twitter_image.png'){
                unlink(base_path("public/uploads/setting_photo/").$seoSetting->twitter_image);
            }
            $manager = new ImageManager(new Driver());
            $twitter_image_name = "Twitter-Image".".". $request->file('twitter_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('twitter_image'));
            $image->toJpeg(80)->save(base_path("public/uploads/setting_photo/").$twitter_image_name);
            $seoSetting->update([
                'twitter_image' => $twitter_image_name
            ]);
        }

        $notification = array(
            'message' => 'SEO setting updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function mailSetting(){
        $mailSetting = MailSetting::first();
        return view('backend.setting.mail', compact('mailSetting'));
    }

    public function mailSettingUpdate(Request $request){
        $request->validate([
            'mail_driver' => 'required',
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required',
        ]);

        $mailSetting = MailSetting::first();
        $mailSetting->update([
            'mail_driver' => $request->mail_driver,
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
        ]);

        $notification = array(
            'message' => 'Mail setting updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function smsSetting(){
        $smsSetting = SmsSetting::first();
        return view('backend.setting.sms', compact('smsSetting'));
    }

    public function smsSettingUpdate(Request $request){
        $request->validate([
            'sms_driver' => 'required',
            'sms_api_key' => 'required',
            'sms_from' => 'required',
        ]);

        $smsSetting = SmsSetting::first();
        $smsSetting->update([
            'sms_driver' => $request->sms_driver,
            'sms_api_key' => $request->sms_api_key,
            'sms_from' => $request->sms_from,
        ]);

        $notification = array(
            'message' => 'SMS setting updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
