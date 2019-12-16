@extends('css.layouts.master')

@section('style')
<style type="text/css">
.card.card-default{
    margin: 5px 5px;
    width: 15%;
    position:relative;
    display:block;
    padding-left: 0;
    padding-right: 6px;
    padding: 5px 5px;
}
</style>
@endsection

@section('content')

<div >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Sales History</div>
                <div class="card-body">
                    <div id="app">
                        <vsale></vsale>
                    </div>
                </div>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
@endsection