@extends('data.master')
@section('content')
<div class="container">
    <div class="card w-50 mx-auto">
        <div class="card-header">
            <h3 class="card-title">Chọn file để get data</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Chọn file</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Get dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@endsection