@extends('Sales.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Data Entry Dashboard</div>

                <div class="panel-body">
                    Greetings.. {{ Auth::guard('web_Sales')->user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
