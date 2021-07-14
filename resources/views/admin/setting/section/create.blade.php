@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.sections') }}</h4>

                    <div class="row">
                        @foreach ($sections as $section)

                            <div class="col-md-3">
                                <div class="card mb-3 shadow-lg">
                                    <div class="card-header">
                                        <h6 class="mb-0">{{ $section->title  }} </h6>
                                    </div>
                                    <div class="card-body">
                                        <form  action="{{ route('section.update', $section->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @if ($section->status == 1)
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('content.hide') }}
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('content.show') }}
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

            </div>
        </div>
    </div>
    <!-- end row -->

@endsection