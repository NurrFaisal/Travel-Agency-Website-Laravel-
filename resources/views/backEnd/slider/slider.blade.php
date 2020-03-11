@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>

                <br/>

                @include('backEnd.slider.include.slider_modal')

                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
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
                        <th>Name</th>
                        <th>Slider Image</th>
                        <th>Status</th>
                        <th>Last Updated On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($sliders as $slider)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Month">{{$slider->name}}</td>
                        <td data-title="Browser Name">
                            <img style="width: 200px; height: 100px" src="{{asset($slider->slider_image)}}" />
                        </td>

                        <td data-title="Status"><span class="status-btn blue-bg">{{$slider->status == 1 ? 'Published' : 'Unpublished'}}</span></td>
                        <td data-title="date">{{$slider->updated_at}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-slider{{$slider->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            <a href="{{URL::to('/delete-slider/'.$slider->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Slider !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('backEnd.slider.include.slider_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $sliders->links() }}
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        function preview_image(id)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image_'+id);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
