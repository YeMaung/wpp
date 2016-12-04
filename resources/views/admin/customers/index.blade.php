@extends('admin.layout.app')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="app.css"> --}}
    <!-- Bootstrap Datepicker -->
    <link href="/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <h2>"List All Post"</h2>
    <div class="row">
        <div class="col-md-12 form-horizontal">
            <div class="form-group">
                <label class="col-md-1 control-label">Date Range</label>
                <div class="col-md-8">
                    <div class="input-group input-daterange">
                        <input type="text" class="form-control" name="start" id="start" placeholder="Date Start" />
                        <span class="input-group-addon">to</span>
                        <input type="text" class="form-control" name="end" id="end" placeholder="Date End" />
                    </div>
                </div>
                <button id="submit" class="col-md-2 btn btn-success">Submit</button>
            </div>
        </div>    
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>Transaction Date</th> 
                    <th>SaleActivity</th> 
                    <th>TopupMobile</th> 
                    <th>PreBalance</th> 
                    <th>PostBalance</th>
                    <th>SaleAmount</th>
                    <th>AgentCommission</th>
                    <th>Status</th>
                    <th>AgentCard</th>
                    <th>Terminal</th>
                    <th>Version</th>
                </tr>
            </thead>
        </table>
    </div>

@endsection

@section('script')

<!-- Bootstrap Datepicker -->
<script src="/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


<script>
$(document).ready(function(){
    $('#start').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true
    });
    $('#end').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
})



$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oTable = $('#users-table').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/customer',
            data: function (d) {
                d.start_date = $('#start').val();
                d.end_date = $('#end').val();
            }
        },
        columns: [
            {data: 'transactionlog_datetime', name: 'transactionlog_datetime'},
            {data: 'saleactivities', name: 'saleactivities'},
            {data: 'TopupMobile', name: 'TopupMobile'},
            {data: 'prebalance', name: 'prebalance'},
            {data: 'postbalance', name: 'postbalance'},
            {data: 'saleamount', name: 'saleamount'},
            {data: 'agentcommission', name: 'agentcommission'},
            {data: 'Status', name: 'Status'},
            {data: 'AgentCard', name: 'AgentCard'},
            {data: 'Terminal', name: 'Terminal'},
            {data: 'Version', name: 'Version'},
        ]
    });

    $('#submit').on('click', function() {
        oTable.draw();
    });
});
</script>
@endsection