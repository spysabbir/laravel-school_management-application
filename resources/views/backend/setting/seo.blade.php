@extends('layouts.template_master')

@section('title', 'Seo Setting')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Seo Setting</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('backend.seo.setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9 col-sm-6 mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $seoSetting->meta_title) }}" placeholder="Site Name">
                            @error('meta_title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="meta_author" class="form-label">Meta Author</label>
                            <input type="text" class="form-control" id="meta_author" name="meta_author" value="{{ old('meta_author', $seoSetting->meta_author) }}" placeholder="Meta Author">
                            @error('meta_author')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-12 col-sm-6 mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keyword</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $seoSetting->meta_keywords) }}" placeholder="Meta Keywords">
                            @error('meta_keywords')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-12 col-sm-6 mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="4" placeholder="Meta Description">{{ old('meta_description', $seoSetting->meta_description) }}</textarea>
                        </div><!-- Col -->
                        <div class="col-lg-9 col-sm-6 mb-3">
                            <label for="og_title" class="form-label">Og Title</label>
                            <input type="text" class="form-control" id="og_title" name="og_title" value="{{ old('og_title', $seoSetting->og_title) }}" placeholder="Og Title">
                            @error('og_title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="og_type" class="form-label">Og Type</label>
                            <input type="text" class="form-control" id="og_type" name="og_type" value="{{ old('og_type', $seoSetting->og_type) }}" placeholder="Og Type">
                            @error('og_type')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="og_url" class="form-label">Og Url</label>
                            <input type="text" class="form-control" id="og_url" name="og_url" value="{{ old('og_url', $seoSetting->og_url) }}" placeholder="Og Url">
                            @error('og_url')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-6 mb-3">
                            <label for="og_image" class="form-label">Og Image</label>
                            <input type="file" class="form-control" name="og_image" id="og_image">
                            @error('og_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <img width="80" height="80" class="mt-1 rounded" src="{{asset('uploads/setting_photo')}}/{{$seoSetting->og_image}}" id="og_imagePreview"  alt="Og Image">
                        </div>
                        <div class="col-lg-12 col-sm-6 mb-3">
                            <label for="og_description" class="form-label">Og Description</label>
                            <textarea class="form-control" id="og_description" name="og_description" rows="4" placeholder="Og Description">{{ old('og_description', $seoSetting->og_description) }}</textarea>
                            @error('og_description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-4 col-sm-6 mb-3">
                            <label for="og_site_name" class="form-label">Og Site Name</label>
                            <input type="text" class="form-control" id="og_site_name" name="og_site_name" value="{{ old('og_site_name', $seoSetting->og_site_name) }}" placeholder="Og Site Name">
                            @error('og_site_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-8 col-sm-6 mb-3">
                            <label for="twitter_card" class="form-label">Twitter Card</label>
                            <input type="text" class="form-control" id="twitter_card" name="twitter_card" value="{{ old('twitter_card', $seoSetting->twitter_card) }}" placeholder="Twitter Card">
                            @error('twitter_card')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="twitter_site" class="form-label">Twitter Site</label>
                            <input type="text" class="form-control" id="twitter_site" name="twitter_site" value="{{ old('twitter_site', $seoSetting->twitter_site) }}" placeholder="Twitter Site">
                            @error('twitter_site')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-9 col-sm-6 mb-3">
                            <label for="twitter_title" class="form-label">Twitter Title</label>
                            <input type="text" class="form-control" id="twitter_title" name="twitter_title" value="{{ old('twitter_title', $seoSetting->twitter_title) }}" placeholder="Twitter Title">
                            @error('twitter_title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-12 col-sm-6 mb-3">
                            <label for="twitter_description" class="form-label">Twitter Description</label>
                            <textarea class="form-control" id="twitter_description" name="twitter_description" rows="4" placeholder="Twitter Description">{{ old('twitter_description', $seoSetting->twitter_description) }}</textarea>
                            @error('twitter_description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-lg-6 mb-3">
                            <label for="twitter_image" class="form-label">Twitter Image</label>
                            <input type="file" class="form-control" name="twitter_image" id="twitter_image">
                            @error('twitter_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <img width="80" height="80" class="mt-1 rounded" src="{{asset('uploads/setting_photo')}}/{{$seoSetting->twitter_image}}" id="twitter_imagePreview"  alt="Twitter Image">
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-3">
                            <label for="twitter_image_alt" class="form-label">Twitter Image Alt</label>
                            <input type="text" class="form-control" id="twitter_image_alt" name="twitter_image_alt" value="{{ old('twitter_image_alt', $seoSetting->twitter_image_alt) }}" placeholder="Twitter Image Alt">
                            @error('twitter_image_alt')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
        $('#og_image').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#og_imagePreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });
        // Favicon Preview
        $('#twitter_image').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#twitter_imagePreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });
    })
</script>
@endsection
