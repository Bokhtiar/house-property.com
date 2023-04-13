@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Property show',
    'anotherPageIcon' => 'bi bi-list',
    'anotherPageUrl' => 'property.index',
])
@endcomponent



<div class="card">
    <div class="card-header flex justify-between items-center">
        <p>
            <span class="card-title">{{ $show->name }}</span> <br>
            <span><i class="bi bi-geo-alt-fill"></i> {{ $show->address }}</span>
        </p>
        {{-- edit button --}}
        <a class="btn btn-outline-success" href="@route('property.edit', $show->property_id)">Property edit</a>

    </div>
    <div class="card-body">
        <img class="mt-4 rounded mx-auto" src="/images/{{ $show->image }}" height="200px" width="" alt="">
        <h5 class="card-title">Description</h5>
        <p>{{ $show->description }}</p>

        {{-- property details --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Property information</h5>
                <!-- Table with hoverable rows -->
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-start">Total units</td>
                            <td class="text-end">{{ $show->total_unit }}</td>
                        </tr>

                        <tr>
                            <td class="text-start">Current Tenants</td>
                            <td class="text-end">1</td>
                        </tr>

                        <tr>
                            <td class="text-start">Average Rent</td>
                            <td class="text-end">3000 Tk</td>
                        </tr>

                        <tr>
                            <td class="text-start">Security Deposit</td>
                            <td class="text-end">6000 Tk</td>
                        </tr>

                        <tr>
                            <td class="text-start">Late fee</td>
                            <td class="text-end">500 Tk</td>
                        </tr>


                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>

        {{-- all unit details --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All unit details</h5>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unit name</th>
                            <th scope="col">Bed room</th>
                            <th scope="col">Baths</th>
                            <th scope="col">Kitchen</th>
                            <th scope="col">Available</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $item)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$item->unit_name}}</td>
                                <td>{{$item->bedroom}}</td>
                                <td>{{$item->baths}}</td>
                                <td>{{$item->kitchen}}</td>
                                <td>avilable</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>

    </div>

</div><!-- End Card with header and footer -->




@section('js')
@endsection
@endsection
