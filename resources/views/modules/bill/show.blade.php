@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Bill List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Bill show',
    'anotherPageIcon' => 'bi bi-list',
    'anotherPageUrl' => 'bill.index',
])
@endcomponent



<div class="card">
    <div class="card-header flex justify-between items-center">
        <p>
            <span class="card-title">Bill header</span> <br>
        </p>
        {{-- edit button --}}
        <a class="btn btn-outline-success" href="@route('property.edit', $show->property_id)">Property edit</a>

    </div>
    <div class="card-body">
    
        <div class="row">
            {{-- tenenat information --}}
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="col-12 col-sm-3 col-lg-3 col-md-3 ">

                    <div class="card px-3 py-3" style="width: 22rem;">
                        <img src="/images/{{ $item->tenant ?$item->tenant->image : "" }}" height="70px" width="70px" class="mx-auto  rounded-full"
                            alt="">

                        <span class="text-center">{{ $item->tenant ? $item->tenant->first_name . ' ' . $item->tenant ? $item->tenant->last_name }}</span>
                        <span class="text-center">{{ $item->tenant ? $item->tenant->contact_number : "" }}</span>

                        {{-- soft information --}}
                        <div class=" my-3">
                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Email: </span>
                                <span class="text-gray-500">{{ $item->tenant ?email }}</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Property: </span>
                                <span class="text-gray-500">{{ $item->Property ? $item->property->name : 'Not assing' }}</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Unit: </span>
                                <span class="text-gray-500">{{ $item->unit ? $item->unit->unit_name : 'Not assing' }}</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Last rent paid: </span>
                                <span class="text-gray-500">N/A</span>
                            </p>
 
                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Current rent: </span>
                                <span class="text-gray-500"> {{$item->unit_id ? App\Models\Unit::current_rent($item->tenant_id, $item->property_id, $item->unit_id).' Tk' : "0 Tk"}} </span>
                            </p>

                            <p class="flex items-center justify-between gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Previous Due: </span>
                                <span class="text-gray-500">3000Tk</span>
                            </p>
                        </div>
                        <a href="@route('tenant.show', $item->tenant_id)" class=" btn btn-primary w-full">View Details</a>
                    </div>
                </div>
            </div>
            {{-- property information --}}
            <div class="col-sm-12 col-md-4 col-lg-4">

            </div>
        </div>

    </div>

</div><!-- End Card with header and footer -->




@section('js')
@endsection
@endsection
