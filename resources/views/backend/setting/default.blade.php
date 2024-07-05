@extends('layouts.template_master')

@section('title', 'Default Setting')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Default Setting</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('backend.default.setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="site_logo" class="form-label">Site Logo</label>
                            <input type="file" class="form-control" name="site_logo" id="site_logo">
                            @error('site_logo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <img width="100" height="80" class="mt-1 rounded" src="{{asset('uploads/setting_photo')}}/{{$defaultSetting->site_logo}}" id="site_logoPreview"  alt="Site Logo">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="site_favicon" class="form-label">Site Favicon</label>
                            <input type="file" class="form-control" name="site_favicon" id="site_favicon">
                            @error('site_favicon')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <img width="80" height="80" class="mt-1 rounded" src="{{asset('uploads/setting_photo')}}/{{$defaultSetting->site_favicon}}" id="site_faviconPreview"  alt="Site Favicon">
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ old('site_name', $defaultSetting->site_name) }}" placeholder="Site Name">
                            @error('site_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_url" class="form-label">Site Url</label>
                            <input type="text" class="form-control" id="site_url" name="site_url" value="{{ old('site_url', $defaultSetting->site_url) }}" placeholder="Site Url">
                            @error('site_url')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-2 col-sm-6 mb-3">
                            <label for="site_timezone" class="form-label">Time Zone</label>
                            <select class="form-select" name="site_timezone" id="site_timezone">
                                <option value="">Select Time Zone</option>
                                <option value="UTC" @selected(old('site_timezone', $defaultSetting->site_timezone == 'UTC'))>UTC</option>
                                <option value="Asia/Dhaka" @selected(old('site_timezone', $defaultSetting->site_timezone == 'Asia/Dhaka'))>Asia/Dhaka</option>
                            </select>
                            @error('site_timezone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-sm-6 mb-3">
                            <label for="site_currency" class="form-label">Site Currency</label>
                            <select class="form-select" name="site_currency" id="site_currency">
                                <option value="">Select Currency</option>
                                <option value="USD" @selected(old('site_currency', $defaultSetting->site_currency == 'USD'))>USD</option>
                                <option value="BDT" @selected(old('site_currency', $defaultSetting->site_currency == 'BDT'))>BDT</option>
                            </select>
                            @error('site_currency')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-2 col-sm-6 mb-3">
                            <label for="site_currency_symbol" class="form-label">Site Currency Symbol</label>
                            <select class="form-select" name="site_currency_symbol" id="site_currency_symbol">
                                <option value="">Select Currency Symbol</option>
                                <option value="$" @selected(old('site_currency_symbol', $defaultSetting->site_currency_symbol == '$'))>$</option>
                                <option value="৳" @selected(old('site_currency_symbol', $defaultSetting->site_currency_symbol == '৳'))>৳</option>
                            </select>
                            @error('site_currency_symbol')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_main_email" class="form-label">Site Main Email</label>
                            <input type="text" class="form-control" id="site_main_email" name="site_main_email" value="{{ old('site_main_email', $defaultSetting->site_main_email) }}" placeholder="Site Main Email">
                            @error('site_main_email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_support_email" class="form-label">Site Support Email</label>
                            <input type="text" class="form-control" id="site_support_email" name="site_support_email" value="{{ old('site_support_email', $defaultSetting->site_support_email) }}" placeholder="Site Support Email">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_main_phone" class="form-label">Site Main Phone</label>
                            <input type="text" class="form-control" id="site_main_phone" name="site_main_phone" value="{{ old('site_main_phone', $defaultSetting->site_main_phone) }}" placeholder="Site Main Phone">
                            @error('site_main_phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_support_phone" class="form-label">Site Support Phone</label>
                            <input type="text" class="form-control" id="site_support_phone" name="site_support_phone" value="{{ old('site_support_phone', $defaultSetting->site_support_phone) }}" placeholder="Site Support Phone">
                        </div><!-- Col -->
                        <div class="col-lg-12 col-sm-6 mb-3">
                            <label for="site_address" class="form-label">Site Address</label>
                            <textarea class="form-control" id="site_address" name="site_address" rows="4" placeholder="Site Address">{{ old('site_address', $defaultSetting->site_address) }}</textarea>
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_facebook" class="form-label">Site Facebook</label>
                            <input type="text" class="form-control" id="site_facebook" name="site_facebook" value="{{ old('site_facebook',$defaultSetting->site_facebook) }}" placeholder="Site Facebook">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_twitter" class="form-label">Site Twitter</label>
                            <input type="text" class="form-control" id="site_twitter" name="site_twitter" value="{{ old('site_twitter', $defaultSetting->site_twitter) }}" placeholder="Site Twitter">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_instagram" class="form-label">Site Instagram</label>
                            <input type="text" class="form-control" id="site_instagram" name="site_instagram" value="{{ old('site_instagram', $defaultSetting->site_instagram) }}" placeholder="Site Instagram">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_linkedin" class="form-label">Site Linkedin</label>
                            <input type="text" class="form-control" id="site_linkedin" name="site_linkedin" value="{{ old('site_linkedin', $defaultSetting->site_linkedin) }}" placeholder="Site Linkedin">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_pinterest" class="form-label">Site Pinterest</label>
                            <input type="text" class="form-control" id="site_pinterest" name="site_pinterest" value="{{ old('site_pinterest', $defaultSetting->site_pinterest) }}" placeholder="Site Pinterest">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_youtube" class="form-label">Site Youtube</label>
                            <input type="text" class="form-control" id="site_youtube" name="site_youtube" value="{{ old('site_youtube', $defaultSetting->site_youtube) }}" placeholder="Site Youtube">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_whatsapp" class="form-label">Site Whatsapp</label>
                            <input type="text" class="form-control" id="site_whatsapp" name="site_whatsapp" value="{{ old('site_whatsapp', $defaultSetting->site_whatsapp) }}" placeholder="Site Whatsapp">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_telegram" class="form-label">Site Telegram</label>
                            <input type="text" class="form-control" id="site_telegram" name="site_telegram" value="{{ old('site_telegram', $defaultSetting->site_telegram) }}" placeholder="Site Telegram">
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="site_tiktok" class="form-label">Site Tiktok</label>
                            <input type="text" class="form-control" id="site_tiktok" name="site_tiktok" value="{{ old('site_tiktok', $defaultSetting->site_tiktok) }}" placeholder="Site Tiktok">
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        // Logo Image Preview
        $('#site_logo').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#site_logoPreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });
        // Favicon Preview
        $('#site_favicon').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#site_faviconPreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });
    })
</script>
@endsection
