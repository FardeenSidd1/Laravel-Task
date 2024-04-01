@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">{{ __('site.blog_post') }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="#">{{ __('site.authour') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            @if (!empty($authour))
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
                                    @if (!empty($authour)) action="{{ route('admin.authour.store', $authour->id) }}"@else action = "{{ route('admin.authour.store') }}" @endif enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">{{ __('site.title') }}
                                                        <span class="input-required">*</span></label>
                                                    <input type="text" id="title"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="Blog Title" name="title"
                                                        value="{{ !empty(old('title')) ? old('title') : (!empty($blogPost->title) ? $blogPost->title : '') }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="position">{{ __('site.position') }}
                                                       </label>
                                                    <input type="text" id="position"
                                                        class="form-control @error('position') is-invalid @enderror"
                                                        placeholder="Blog position" name="position"
                                                        value="{{ !empty(old('position')) ? old('position') : (!empty($authour->position) ? $blogPost->position : '') }}">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="name">{{ __('site.Image') }}<span class="input-required">*</span></label>
                                                <input type="file" id="image" class="form-control" placeholder="{{ __('site.Image') }}" name="image">
                                                <div><span>{{ __('site.Max upload file size 10 MB') }}</span></div>
                                                @if(isset($blogPost->image))
                                                    <img src="{{ asset('storage/blog/' . $blogPost->image) }}" alt="Image Preview" style="width:50px;height:50px;">
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea id="content" rows="5" class="form-control" name="content" placeholder="Content">{{ !empty(old('content'))? old('content'): (!empty($authour->content)? $authour->content: '') }}</textarea>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="description">{{ __('site.Description') }} <span
                                                    class="text-light">
                                                    <p>({{ __('site.Maximum : 255 Characters') }})</p>
                                                </span></label>
                                            <textarea type="text" id="description" class="ckeditor @error('description') is-invalid @enderror" cols="30"
                                                rows="15"
                                                name="description">{{ !empty(old('description'))? old('description'): (!empty($blogPost->description)? $blogPost->description: '') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" style="display:block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-actions" style="text-align: center">
                                            <button type="submit" class="btn btn-success">{{ __('site.save') }}</button>
                                            <a href="{{ route('admin.blog-posts.index', ['action' => 'index']) }}"
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
