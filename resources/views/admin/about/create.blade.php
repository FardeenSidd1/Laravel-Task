@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">{{ __('site.about_us') }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="#">{{ __('site.about_us') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            @if (!empty($about))
                                {{ __('site.edit') }}
                            @else
                                {{ __('site.add') }}
                            @endif
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">{{ __('site.add') }}</h4>
                            <a class="heading-elements-toggle">
                                <i class="la la-ellipsis-v font-medium-3"></i>
                            </a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" method="POST"
                                    @if (!empty($about)) action="{{ route('admin.about.store', $about->id) }}"@else action = "{{ route('admin.about.store') }}" @endif enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">{{ __('site.title') }}
                                                        <span class="input-required">*</span></label>
                                                    <input type="text" id="title"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="title" name="title"
                                                        value="{{ !empty(old('title')) ? old('title') : (!empty($about->title) ? $about->title : '') }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="name">{{ __('site.image') }}<span class="input-required">*</span></label>
                                                <input type="file" id="image" class="form-control" placeholder="{{ __('site.Image') }}" name="image">
                                                <div><span>{{ __('site.Max upload file size 10 MB') }}</span></div>
                                                @if(isset($about->image))
                                                    <img src="{{ asset('storage/about/' . $about->image) }}" alt="Image Preview" style="width:50px;height:50px;">
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="content">{{ __('site.content') }}</label>
                                            <textarea id="content" rows="5" class="form-control" name="content" placeholder="Content">{{ !empty(old('content'))? old('content'): (!empty($about->content)? $about->content: '') }}</textarea>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="description">{{ __('site.description') }} <span
                                                    class="text-light">
                                                    <p>({{ __('site.Maximum : 255 Characters') }})</p>
                                                </span></label>
                                            <textarea type="text" id="description" class="ckeditor @error('description') is-invalid @enderror" cols="30"
                                                rows="15"
                                                name="description">{{ !empty(old('description'))? old('description'): (!empty($about->description)? $about->description: '') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" style="display:block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-actions" style="text-align: center">
                                            <button type="submit" class="btn btn-success">{{ __('site.save') }}</button>
                                            <a href="{{ route('admin.about.index', ['action' => 'index']) }}"
                                                class="btn btn-danger">{{ __('site.back') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic form layout section end -->
    </div>
@endsection
