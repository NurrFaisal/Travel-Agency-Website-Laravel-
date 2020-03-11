@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
{{--                <div class="pull-right table-title-top-action">--}}
{{--                    <div class="pmd-textfield pull-left">--}}
{{--                        <input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">--}}
{{--                    </div>--}}
{{--                    <a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>--}}
{{--                </div>--}}
                <br/>
                @include('backEnd.new-gellery.year.include.year_main_category_modal')

                <h1 class="section-title" id="services">
                    <span>Gallery Years List</span>
                </h1>
                @if(Session::get('message'))
                <div style="text-align: center" class="alert alert-{{Session::get('type')}}"><b>{{Session::get('message')}}</b></div>
                @endif
            </div>
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
{{--                        <th>Box Image</th>--}}
                        <th>Status</th>
                        <th>Last Updated On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($years as $year)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$year->name}}</td>
{{--                        <td data-title="Month">--}}
{{--                            <img style="width: 100px; height: 100px" src="{{asset($year->box_image)}}" />--}}
{{--                        </td>--}}
                        <td data-title="Total">{{$year->status == 1 ? 'Published' : 'Unpublished'}}</td>

                        <td data-title="date">{{$year->updated_at}}</td>
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$year->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            @if(Session::get('admin') == 1)
                            <a href="{{URL::to('/apanel/gallery/delete-year/'.$year->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Year !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                             @endif
                        </td>
                    </tr>
                    @include('backEnd.new-gellery.year.include.year_main_category_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $years->links() }}
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
