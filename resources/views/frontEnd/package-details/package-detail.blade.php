@extends('frontEnd.index')
@section('title') {{$package->name}} @endsection
@section('mainContent')
<div class="no-print">
    @include('frontEnd.package-details.includes.package_banner')
</div>


    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space">
                @include('frontEnd.package-details.includes.package_right_content')
                <div class="no-print">
                    @include('frontEnd.package-details.includes.package_side_content')
                </div>
            </div>
        </div>
    </section>
@endsection
