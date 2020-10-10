@extends('layout.layout')

@section('content')

    @include('layout.title',[
        'url' => 'item',
        'urlTitle' => 'رجوع',
        'title'=>''
        ])

    <table class="table table-bordered">
        <tr>

            <th>رقم الكمبيوتر</th>
            <th>الخيارات</th>

        </tr>

        @foreach ($MTI as $M)
            <tr>
                <td>{{ $M->ComputerNo }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('show',$M->ComputerNo) }}">عرض</a>
                </td>
            </tr>
        @endforeach


    </table>

    <div class="d-flex justify-content-center">
        {{ $MTI->appends(request()->except('page'))->links() }}.
    </div>




@endsection
