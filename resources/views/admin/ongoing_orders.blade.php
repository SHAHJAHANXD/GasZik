@extends('admin.layout')
@section('content')
@section('extra_heads')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/stylee.css" />
   
@endsection
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Data table</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Configuration Table</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <table class=" " id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sr#</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Total Amount</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Net Amount + Tax & ServiceCharges</th>
                                            <th class="text-center">Assigned Time</th>
                                            <th class="text-center">Dispatched Time</th>
                                            <th class="text-center">Delivered Time</th>
                                            <th class="text-center">Paid Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @isset($order)
                                            @foreach ($order as $order)
                                        <tr>
                                            <td class="text-center table-img center">
                                                {{ $i++ }}
                                            </td>
                                            <td class="text-center">{{ $order->status }}</td>
                                            <td class="text-center">{{ $order->totalAmount }}</td>
                                            <td class="text-center">{{ $order->discount }}</td>
                                            <td class="text-center">
                                                {{ $order->netAmount + $order->tax + $order->serviceCharges }}
                                            </td>
                                            <td class="text-center">{{ $order->assignedTime }}</td>
                                            <td class="text-center">{{ $order->dispatchedTime }}</td>
                                            <td class="text-center">{{ $order->deliveryTime }}</td>
                                            @if ($order->paidstatus == 0)
                                                <td class="text-center"><span
                                                        class="badge badge-secondary text-white"
                                                        href="">False</span></td>
                                            @endif
                                            @if ($order->paidstatus == 1)
                                                <td class="text-center"><span
                                                        class="badge badge-success text-white">True</span>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        View
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#myModal" href="">Accept Or Reject
                                                            Order</a>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#myModal1" href="">Change Driver</a>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#myModal2" href="">Driver Info</a>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#myModal3" href="">Customer Info</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> @endforeach @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <a type="button" data-dismiss="modal">Dispatch order Reject Order</a>
                </h3>
            </div>
            <div class="modal-body">
                <?php
                if (isset($order->id) && $order->id != 0) {
                    $url = url('admin/Order/RejectOrder/' . $order->id ?? '');
                }
                ?>
                <form action="{{ url($url) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select name="status" class="form-control" id="Status">
                            <option value="Dispatched">Dispatch Order</option>
                            <option value="Rejected">Reject Order</option>
                        </select>
                    </div>
                    <div class="modal-foter">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-outline-danger" type="button"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <input class="btn btn-outline-success" type="submit" name="submit" value="Save"
                                    style="float: right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <a type="button" data-dismiss="modal">Change Driver</a>
                </h3>
            </div>
            <div class="modal-body">
                <?php
                if (isset($order->id) && $order->id != 0) {
                    $url = url('admin/Order/RejectOrder/' . $order->id ?? '');
                }
                ?>
                <form action="{{ url($url) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select name="driverId" class="form-control" id="driverId">
                            <option value="">Select Driver...</option>
                            @foreach ($driver as $driver )
                            <option value="90">{{$driver->fname}} {{$driver->lname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-foter">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-outline-danger" type="button"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <input class="btn btn-outline-success" type="submit" name="submit" value="Save"
                                    style="float: right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>
                        <a type="button" data-dismiss="modal">Driver Info</a>
                    </h3>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($order->id) && $order->id != 0) {
                        $url = url('admin/Order/RejectOrder/' . $order->id ?? '');
                    }
                    ?>
                    <form action="{{ url($url) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select name="driverId" class="form-control" id="driverId">
                                <option value="">Select Driver...</option>
                            </select>
                        </div>
                        <div class="modal-foter">
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-outline-danger" type="button"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <input class="btn btn-outline-success" type="submit" name="submit" value="Save"
                                        style="float: right">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>
                            <a type="button" data-dismiss="modal">Customer Info</a>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (isset($order->id) && $order->id != 0) {
                            $url = url('admin/Order/RejectOrder/' . $order->id ?? '');
                        }
                        ?>
                        <form action="{{ url($url) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select name="driverId" class="form-control" id="driverId">
                                    <option value="">Select Driver...</option>
                                    
                                  
                                </select>
                            </div>
                            <div class="modal-foter">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-outline-danger" type="button"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6">
                                        <input class="btn btn-outline-success" type="submit" name="submit" value="Save"
                                            style="float: right">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('extra_scripts')
<script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection
