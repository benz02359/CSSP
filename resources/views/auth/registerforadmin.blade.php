@extends('web.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                        @csrf

                        
                            <div class="col-md-4" >
                                <a href="{{ route('registeradmin') }}" >{{ __('Register Admin') }}</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('registerstaff') }}" >{{ __('Register Staff') }}</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('registeragent') }}" >{{ __('Register Agent') }}</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('registeruser') }}" >{{ __('Register User') }}</a>
                            </div>
                       
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
