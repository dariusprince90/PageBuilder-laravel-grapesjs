@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 60px; margin-bottom: 60px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="home-content-header">
                    DESCRIPTION OF THE SERVICE
                </div>
                <div class="home-content-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($data as $val)
                        @if ($val->is_published == 1)
                            <a href="{{ url('/page/' . $val->url) }}" class="website-card" target="_blank">
                                <div style="{!! $val->html['css'] !!}">
                                    {!! $val->html['html'] !!}
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="home-content-footer">
                    OPTIONAL ADDITIONAL INFORMATION
                </div>
            </div>
        </div>
    </div>
@endsection
