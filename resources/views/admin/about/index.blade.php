@extends('admin.layouts.app')
@section('content')
    <!--BEGIN content-->
    <div class="row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">{{ __('site.about_us') }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('site.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('site.about_us') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!--Form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="height: 50px;">
                            <div class="card-title layout_btns" id="basic-layout-form">
                                <h3>{{ __('site.list') }}</h3>
                            </div>
                            
                        </div>

                        <!--Card Content start-->
                        <div class="card-content collapse show">
                            
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    @csrf
                                    <table class="table table-striped table-bordered zero-configuration" id="abouts"
                                        style="width: 100%; display: table;">
                                        <thead>
                                            <tr>
                                                <th>{{ __('site.id') }}</th>
                                                <th>{{ __('site.title') }}</th>
                                                <th>{{ __('site.image') }}</th>
                                                <th>{{ __('site.content') }}</th>
                                                <th>{{ __('site.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{ __('site.id') }}</th>
                                                <th>{{ __('site.title') }}</th>
                                                <th>{{ __('site.image') }}</th>
                                                <th>{{ __('site.content') }}</th>
                                                <th>{{ __('site.action') }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function() {
            // Data table for serverside

            $('#abouts').DataTable({
                language: {
                    searchPlaceholder: "Search Name"
                },
                "pageLength": 25,
                "aaSorting": [
                    [1, "desc"]
                ],
                "order": [
                    [1, 'desc']
                ],
                "oLanguage": {
                    "sEmptyTable": "No Record Found",
                    "sSearchPlaceholder": "Search title,content",
                    
                },

                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.about.list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}",

                    }
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "image"
                    },
                    {
                        "data": "content"
                    },
                    {
                        "data": "action"
                    },
                ],
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [-1, -2,-3,-4]
                }]
            });
        });
    </script>
@endsection
