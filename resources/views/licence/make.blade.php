@extends('layout.layout')

@section('content')

    @if(isset($f))

        <h1>{{$f}}</h1>
    @endif

    <form action="{{ route('licenceMake') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>date :</strong>
                    <input type="date" name="date" class="form-control">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">create </button>
            </div>
        </div>

    </form>
@endsection
