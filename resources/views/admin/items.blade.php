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
                                    <h3 class="m-0">Items table</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Table</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="/admin/add-items" data-target="#addcategory" class="btn_1">Add
                                                Items</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center"> Name</th>
                                                <th class="text-center">اسم</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">وصف</th>
                                                <th class="text-center">ItemType</th>
                                                <th class="text-center">نوع العنصر</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @isset($items)
                                                @foreach ($items as $items)
                                                    <tr>
                                                        <td class="text-center table-img">
                                                            {{ $i++ }}
                                                        </td>
                                                        <td class="text-center">{{ $items->name }}</td>
                                                        <td class="text-center">{{ $items->nams1 }}</td>
                                                        <td class="text-center">{{ $items->description }}</td>
                                                        <td class="text-center">{{ $items->description1 }}</td>
                                                        <td class="text-center">{{ $items->itemtype }}</td>
                                                        <td class="text-center">{{ $items->itemtype1 }}</td>
                                                        <td class="text-center">{{ $items->unitprice }}</td>
                                                        <td class="text-center"> <img
                                                                src="{{ asset('/images/' . $items->image) }} " width="40"
                                                                height="40" /></td>

                                                        <td class="text-center">
                                                            @if ($items->status == 1)
                                                                <form action="/admin/status-zero/{{ $items->id }}"
                                                                    method="POST">
                                                                    {{ csrf_field() }}
                                                                    <button type="submit"
                                                                        class="btn btn-success">Available</button>
                                                                </form>
                                                            @else
                                                                <form action="/admin/status-one/{{ $items->id }}"
                                                                    method="POST">
                                                                    {{ csrf_field() }}
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Unavailable</button>
                                                                </form>
                                                            @endif
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
@endsection
@section('extra_scripts')
    <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
