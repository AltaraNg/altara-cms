@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catalog</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @guest
                            <h5>Kindly login to access all features</h5>
                        @else
                            <h5>Welcome to app catalog, you are logged in!</h5>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
