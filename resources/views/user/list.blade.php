<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @if (session()->has('success'))
        <div class="alter alert-success col-lg-12">
            {{ session()->get('success') }}
        </div>
    @endif
    <h2 style="text-align: center;">Danh sách user</h2>
    <a href="{{ route('users.create') }}" ><button style="margin-bottom: 10px;" class="btn btn-success">Thêm mới user</button></a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Địa chỉ mail</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
            </tr>
        </thead>
        <tbody>
            @php
                $stt++;
            @endphp
            @foreach ($listUser as $value)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $value->mail_address }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listUser->links() }}
</body>
</html>
