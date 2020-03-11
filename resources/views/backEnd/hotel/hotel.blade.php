@extends('backEnd.index')

@section('mainContent')
    <div id="content" class="pmd-content inner-page">
    
        <div class="container-fluid full-width-container value-added-detail-page">
            <div>
                <form method="post" action="{{URL::to('/search-hotel')}}">
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="text" id="exampleInputAmount" name="searchHotel" class="form-control" placeholder="Search for...">
                        </div>
                        <button  type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                    @csrf
                </form>
            
                <br/>
                @include('backEnd.hotel.include.hotel_modal')

                <h1 class="section-title" id="services">
                    <span>Hotel</span>
                </h1><!-- End Title -->
               
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
                        <th>Image</th>
                        <th>star</th>
                        <th>Category</th>
                        <th>Country</th>
                        <!--<th>City</th>-->
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($hotels as $hotel)
                    <tr>
                        <td data-title="Ticket No">{{$i++}}</td>
                        <td data-title="Browser Name">{{$hotel->name}}</td>
                        <td data-title="Month">
                            <img style="width: 100px; height: 100px" src="{{asset($hotel->box_image)}}" />
                        </td>
                        <td data-title="Browser Name">{{$hotel->star}}</td>
                        <td data-title="Browser Name">{{$hotel->category}}</td>
                        <td data-title="Browser Name">{{$hotel->countryf->name}}</td>
                        <!--<td data-title="Browser Name">{{$hotel->divisionf->name}}</td>-->
                        <td data-title="Browser Name">{{$hotel->price}}</td>
                        <td data-title="Total">{{$hotel->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        {{--<td data-title="date">{{$hotel->updated_at}}</td>--}}
                        <td class="pmd-table-row-action">
                            <a data-target="#form-dialog-sub{{$hotel->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">edit</i>
                            </a>
                            <a href="{{URL::to('/delete-hotel/'.$hotel->id)}}" onclick="return confirm('Are You Sure? You Want To Delete This Hotel !!!')" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">delete</i>
                            </a>
                        </td>
                    </tr>
                    @include('backEnd.hotel.include.hotel_modal_update')
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div style="float: right">
                {{ $hotels->links() }}
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type='text/javascript'>
        function preview_image2(id)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image2_'+id);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
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

    <!--<script>-->
    <!--    $(document).on('change','#country_id', function () {-->
    <!--        var country_id = $(this).val();-->

    <!--        var op= " ";-->

    <!--        $.ajax({-->
    <!--            type:'get',-->
    <!--            url: '{!! URL::to('/manage-division') !!}',-->
    <!--            data:{'id':country_id},-->
    <!--            success:function (data) {-->
    <!--                console.log(data)-->
                    // for (var i=0; i<data.length; i++) {
                    //     op +='<option  value="'+data[i].id+'">'+data[i].name+'</option>';
                    // }
    <!--                $('#division_id').html(data);-->

    <!--            }-->
    <!--        });-->

    <!--    });-->
    <!--</script>-->

@endsection
