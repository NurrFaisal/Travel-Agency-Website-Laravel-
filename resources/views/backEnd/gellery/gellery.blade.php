@extends('backEnd.index')
@section('mainContent')
@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>

                <br/>

                @include('backEnd.gellery.include.gellery_modal')
                @if(Session::get('message'))
                    <br/>
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                @endif
                <h1 class="section-title" id="services">
                    <span>Slider Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
            </div>
            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Gellery Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($gellery_images as $gellery_image)
                        <tr>
                            <td data-title="Ticket No">{{$i++}}</td>
                            <td data-title="Browser Name">
                                <img style="width: 200px; height: 100px" src="{{asset($gellery_image->box_image)}}" />
                            </td>
                            <td class="pmd-table-row-action">
                                <a href="{{URL::to('/delete-gellery-image/'.$gellery_image->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Image !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                        </tr>
                        {{--@include('backEnd.slider.include.slider_modal_update')--}}
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
