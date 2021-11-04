
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:rgb(1,0,0,0); border-color:rgb(1,0,0,0); color:whitesmoke;">

                <div class="card-body" style="text-align:center;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 >Bienvenido Cadete {{ Auth::user()->name }}<h1>
            </div>
        </div>
    </div>
</div>
@endsection
