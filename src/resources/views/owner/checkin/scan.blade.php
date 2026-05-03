@extends('layouts.app')

@section('content')
<div class="container">
    <h2>QRコード読み取り</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <div id="preview" style="width:300px;"></div>

    <form id="checkin-form" method="POST" action="/owner/checkin/verify">
        @csrf
        <input type="hidden" name="token" id="token">
    </form>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
const html5QrCode = new Html5Qrcode("preview");

html5QrCode.start(
    { deviceId: { exact: "b1a445266b6e41281550e7b40a4a2956f844e01df296cbbe01e95805fbdaf38d" } },
    { fps: 10, qrbox: 250 },
    qrCodeMessage => {
        document.getElementById('token').value = qrCodeMessage;
        document.getElementById('checkin-form').submit();
    },
    errorMessage => {
        console.log("QR scan error:", errorMessage);
    }
).catch(err => {
    console.log("Camera start error:", err);
    alert("カメラ起動エラー: " + err);
});
</script>
@endsection