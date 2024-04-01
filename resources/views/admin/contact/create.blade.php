@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">{{ __('site.contact_us') }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="#">{{ __('site.contact_us') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            @if (!empty($contact))
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
                                    @if (!empty($contact)) action="{{ route('admin.contact.store', $contact->id) }}"@else action = "{{ route('admin.contact.store') }}" @endif enctype="multipart/form-data">
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
                                                        value="{{ !empty(old('title')) ? old('title') : (!empty($contact->title) ? $contact->title : '') }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="content">{{ __('site.content') }}</label>
                                            <textarea id="content" rows="5" class="form-control" name="content" placeholder="Content">{{ !empty(old('content'))? old('content'): (!empty($contact->content)? $contact->content: '') }}</textarea>
                                        </div>
                                       
                                        <div class="form-actions" style="text-align: center">
                                            <button type="submit" class="btn btn-success">{{ __('site.save') }}</button>
                                            <a href="{{ route('admin.contact.index', ['action' => 'index']) }}"
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
