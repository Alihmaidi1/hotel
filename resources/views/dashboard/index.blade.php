@extends('template.master')
@section('title', 'Dashboard')
@section('head')
    <link rel="stylesheet" href="{{ asset('style/css/admin.css') }}">
@endsection
@section('content')
    <div id="dashboard">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card shadow-sm border" style="border-radius: 0.5rem">
                            <div class="card-body">
                                <h5> Guests this day</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow-sm border" style="border-radius: 0.5rem">
                            <div class="card-body text-center">
                                <h5>Dashboard</h5>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box border -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <h3>Today Guests</h3>
                                        <div>
                                            <a href="#" class="btn btn-tool btn-sm">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="btn btn-tool btn-sm">
                                                <i class="fas fa-bars"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table style="vertical-align: middle" class="table text-center table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Room</th>
                                            <th class="text-center">Stay</th>
                                            <th>Day Left</th>
                                            <th>Debt</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $transaction)
                                            <tr>
                                                <td>
                                                    <img style="width:50px;height:50px" src="{{ asset("upload/customer/".$transaction->customer->avatar) }}"
                                                        class="rounded-circle img-thumbnail" width="40" height="40" alt="">
                                                </td>
                                                <td>
                                                    <a >
                                                        {{ $transaction->customer->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a >
                                                        {{ $transaction->room->number }}
                                                    </a>
                                                </td>
                                                <td>{{ differce_date(Date("Y-m-d"),$transaction->check_out) }}</td>
                                                <td>{{ differce_date(Date("Y-m-d"),$transaction->check_in) }}</td>
                                                <td>{{ sum_payment($transaction->payments) }}</td>
                                                <td>
                                                    <span>
                                                    {{ $transaction->status }}
                                                    </span>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    There's no data in this table
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div class="row justify-content-md-center mt-3">
                                    <div class="col-sm-10 d-flex mx-auto justify-content-md-center">
                                        <div class="pagination-block">
                                            {{ $transactions->onEachSide(1)->links('template.paginationlinks') }}
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Monthly Guests Chart</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Belum</span>
                                        <span>Total Guests at {{ Date("m") . '/' . Date("Y") }}</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> Belum
                                    </span>
                                    <span class="text-muted">Since last month</span>
                                </p>
                                </div>
                                <div class="position-relative mb-4">
                                <canvas id="barChart"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        let id={!! auth()->user()->id !!}
        Echo.private(`message`)
            .listen('payment', (e) => {

                if(id!=e.id){

                    let notification_count=document.getElementById('notification_count');
                    let count=parseInt(notification_count.innerHTML)+1;
                    console.log(count)
                    console.log(e)
                    notification_count.innerHTML=count;
                    let notification_list=document.getElementById('notification_list');
                    let li=`
                    <li>
                                    <p>
                                        ${ e.messages }
                                        <span class="timeline-icon" style="margin-left: -1px; margin-top:-3px"><i
                                                class="fa fa-cash-register"></i></span>
                                        <span
                                            class="timeline-date">${e.created_at}</span>
                                    </p>
                                </li>
                    `;

                                console.log(li)

                                notification_list.innerHTML+=li
                }




            });
    </script>

@endsection
@section('footer')
<script src="{{ asset('style/js/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('style/js/chart.min.js') }}"></script>
<script src="{{ asset('style/js/barchart.js') }}"></script>

<script src="{{ asset('style/js/guestsChart.js') }}"></script>
<script>
    function reloadJs(src) {
        src = $('script[src$="' + src + '"]').attr("src");
        $('script[src$="' + src + '"]').remove();
        $('<script/>').attr('src', src).appendTo('head');
    }

    Echo.channel('dashboard')
        .listen('.dashboard.event', (e) => {
            $("#dashboard").hide()
            $("#dashboard").load(window.location.href + " #dashboard");
            $("#dashboard").show(150)
            reloadJs('style/js/guestsChart.js');
            toastr.warning(e.message, "Hello, {{auth()->user()->name}}");
        })

</script>
@endsection
