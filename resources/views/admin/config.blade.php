@extends('admin.layout')
@section('extra_heads')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
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
                                                <th class="text-center">#</th>
                                                <th class="text-center">Service Charges</th>
                                                <th class="text-center">Delivery Charges</th>
                                                <th class="text-center">Tax</th>
                                                <th class="text-center">Contact Email</th>
                                                <th class="text-center">Contact Number</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @isset($driver)
                                                @foreach ($driver as $driver)
                                                    <tr>
                                                        <td class="text-center table-img center">
                                                            {{ $i++ }}
                                                        </td>
                                                        <td class="text-center">{{ $driver->ServiceCharges }} </td>
                                                        <td class="text-center">{{ $driver->DeliveryCharges }}</td>
                                                        <td class="text-center">{{ $driver->Tax }}</td>
                                                        <td class="text-center">{{ $driver->SupportEmail }}</td>
                                                        <td class="text-center">{{ $driver->SupportContact }}</td>
                                                        <td class="text-center"><a href="/admin/update-configuration/{{$driver->id}}" class="btn btn-success">Edit</a></td>
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
@endsection
@section('extra_scripts')
    <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
