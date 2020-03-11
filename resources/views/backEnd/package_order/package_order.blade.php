@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
{{--                <form method="post" action="{{URL::to('/search-visa-order')}}">--}}
{{--                    <div class="pull-right table-title-top-action">--}}
{{--                        <div class="pmd-textfield pull-left">--}}
{{--                            <input type="text" id="exampleInputAmount" name="searchVisaOrder" class="form-control" placeholder="Search for...">--}}
{{--                        </div>--}}
{{--                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>--}}
{{--                    </div>--}}
{{--                    @csrf--}}
{{--                </form>--}}
                <!-- Title -->
                <br/>
                {{--@include('backEnd.country.include.country_modal')--}}

                <h1 class="section-title" id="services">
                    <span>Package Order</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                @if(Session::get('message'))
                    <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                @endif
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Date</th>
                        <th>Country Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($package_orders as $package_order)
                        <tr>
                            <td data-title="Ticket No">{{$i++}}</td>
                            <td data-title="Ticket No">{{$package_order->created_at->format('d-m-Y')}}</td>
                            <td data-title="Browser Name">{{$package_order->package_name}}</td>
                            <td data-title="Browser Name">{{$package_order->name}}</td>
                            <td data-title="Browser Name">{{$package_order->email}}</td>
                            <td data-title="Browser Name">{{$package_order->phone_number}}</td>
                            <td class="pmd-table-row-action">
                                <a data-target="#form-dialog-orderPackage{{$package_order->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">edit</i>
                                </a>
                                <a href="{{URL::to('/delete-package-order/'.$package_order->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Order !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                        </tr>
                        @include('backEnd.package_order.include.package_order_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $package_orders->links() }}
            </div>
        </div>
    </div>

@endsection
