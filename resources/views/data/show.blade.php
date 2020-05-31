@extends('data.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Dữ liệu bảng SQL SERVER</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Height</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sinhvien_sqlsrv as $srv)
                        <tr>
                            <td >{{ $srv->StudentName }}</td>
                            <td>{{ $srv->DateOfBirth }}</td>
                            <td>{{ $srv->Height}}</td>
                            <td>{{ $srv->Weight }}</td>
                        </tr>
                        @empty
                           <tr>Không có dữ liệu</tr> 
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h3>Dữ liệu bảng MY SQL</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Height</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sinhvien_mysql as $sql)
                        <tr>
                            <td scope="row">{{ $sql->id }}</td>
                            <td>{{ $sql->name }}</td>
                            <td>{{ $sql->birthday }}</td>
                            <td>{{ $sql->height }}</td>
                            <td>{{ $sql->weight }}</td>
                        </tr>
                        @empty
                           <tr>Không có dữ liệu</tr> 
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="showdata" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Chuyen du lieu</button>
                </form>
            </div>
        </div>
    </div>
@endsection