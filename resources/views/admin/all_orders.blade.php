@extends('admin.layout')
@section('content')
@section('extra_heads')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                                                <th scope="col">Sr#</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Net Amount + Tax & ServiceCharges</th>
                                                <th scope="col">Assigned Time</th>
                                                <th scope="col">Dispatched Time</th>
                                                <th scope="col">Delivered Time</th>
                                                <th scope="col">Paid Status</th>
                                                <th scope="col">Action</th>
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

                                                        @if ($order->status == 2)
                                                            <td class="text-center"><span
                                                                    class="badge badge-secondary text-white"
                                                                    href="">Dispatched</span></td>
                                                        @endif
                                                        @if ($order->status == 1)
                                                            <td class="text-center"><span
                                                                    class="badge badge-success text-white">On the Way</span>
                                                            </td>
                                                        @endif
                                                        @if ($order->status == 0)
                                                            <td class="text-center"><span
                                                                    class="badge badge-danger text-white">Delivered</span></td>
                                                        @endif
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
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-outline-info dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fas fa-eye"></i> View
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <button class="dropdown-item" type="button">
                                                                        <a style="cursor:pointer;" onclick="OrderItems(1324)"
                                                                            class="text-info" data-toggle="modal"
                                                                            title="OrderItem" data-placement="top">Order
                                                                            info</a>
                                                                    </button>
                                                                    <button class="dropdown-item" type="button">
                                                                        <a style="cursor:pointer;" onclick="DespatchOrder(1324)"
                                                                            class="text-info" data-toggle="modal"
                                                                            title="Dispatch or reject Order"
                                                                            data-target="#DespatchOrder">Assign or Reject</a>
                                                                    </button>
                                                                    <button class="dropdown-item" type="button">
                                                                        <a style="cursor:pointer;" onclick="AssignDriver(1324)"
                                                                            class="text-info" data-toggle="modal"
                                                                            title="Assign Order to Driver or reject order"
                                                                            data-target="#DriverAssignModal">Change Driver </a>
                                                                    </button>
                                                                    <button class="dropdown-item" type="button">
                                                                        <a style="cursor:pointer;" onclick="DriverDetails(1324)"
                                                                            class="text-info" data-toggle="tooltip"
                                                                            title="Driver information"
                                                                            data-placement="top">Driver info</a>
                                                                    </button>
                                                                    <button class="dropdown-item" type="button">
                                                                        <a style="cursor:pointer;"
                                                                            onclick="CustomerDetails(1324)"
                                                                            class="text-info" data-toggle="tooltip"
                                                                            title="Customer information"
                                                                            data-placement="top">Customer info</a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DespatchOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Dispatch order Reject Order</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Order/RejectOrder" method="post">
                        <div class="form-group">
                            <input type="hidden" name="RejectorderId" id="RejectorderId" />
                        </div>
                        <div class="form-group">
                            <select name="Status" class="form-control" id="Status">
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
    <!-- DriverSaveModal Modal-->
    <div class="modal fade" id="DriverAssignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Order to Driver</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Order/AssignDriver" method="post">
                        <div class="form-group">
                            <input type="hidden" name="orderId" id="orderId" />
                        </div>
                        <div class="form-group">
                            <select name="driverId" class="form-control" id="driverId">
                                <option value="">Select Driver...</option>
                                @isset($driver)
                                    @foreach ($driver as $driver)
                                        <option value="90">{{ $driver->fname }} {{ $driver->lname }}</option>
                                    @endforeach
                                @endisset
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
    <div class="modal fade" id="DriverDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Driver Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-responsive">
                                <tr>
                                    <th>Driver Name</th>
                                    <td><input type="text" id="employer" readonly="" style="border: none" /></td>
                                </tr>
                                <tr>
                                    <th>Driver Phone number:</th>
                                    <td><input type="text" id="employerEmail" readonly="" style="border: none" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CustomerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-responsive">
                                <tr>
                                    <th>Customer Name</th>
                                    <td><input type="text" id="cuatomerName" readonly="" style="border: none" /></td>
                                </tr>
                                <tr>
                                    <th>Customer Phone number:</th>
                                    <td><input type="text" id="cuatomerPhone" readonly="" style="border: none" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="OrderItemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Items</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-responsive-md" id="order-items-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr#</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="orderItemRow">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr id="orderItemRowFooter">
                                        <th colspan="2"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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