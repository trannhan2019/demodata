@extends('data.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hiển thị dữ liệu sau khi get</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('getfile') }}" class="btn btn-info">Thêm tiếp dữ liệu</a>
                <table id="table_id" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>muctieunam_id</th>
                            <th>user_id</th>
                            <th>date</th>
                            <th>power</th>
                            <th>quantity</th>
                            <th>MNH</th>
                            <th>rain</th>
                            <th>device</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->muctieunam_id }}</td>
                            <td>{{ $d->user_id }}</td>
                            <td>{{ $d->date }}</td>
                            <td>{{ $d->power }}</td>
                            <td>{{ $d->quantity }}</td>
                            <td>{{ $d->MNH }}</td>
                            <td>{{ $d->rain }}</td>
                            <td>{{ $d->device }}</td>
                            <td>{{ $d->status }}</td>
                        </tr> 
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection