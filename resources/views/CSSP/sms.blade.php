@extends('cssp.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <form action="{{ url('sms') }}" method="POST">
            @csrf
            <div>
                <label for="mobile">เบอร์โทรศัพท์</label>
                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="เบอร์โทรศัพท์ของคุณ">
            </div>
            <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
        </form>
        </div>
    </div>
</div>
    

@endsection