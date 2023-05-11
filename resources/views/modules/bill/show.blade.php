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
            <span class="card-title">Bill details information</span> <br>
        </p>
        {{-- edit button --}}
        <a class="btn btn-outline-success" href="@route('bill.edit', $show->bill_id)">Bill edit</a>

    </div>
    <div class="card-body mt-4">

        <div class="row">
            {{-- tenenat information --}}
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card px-3 py-3" style="width: 22rem;">
                    <img src="/images/{{ $tenant->image }}" height="70px" width="70px" class="mx-auto  rounded-full"
                        alt="">

                    <span class="text-center">{{ $tenant->first_name . ' ' . $tenant->last_name }}</span>
                    <span class="text-center">{{ $tenant->contact_number }}</span>

                    {{-- soft information --}}
                    <div class=" my-3">
                        <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                            <span class="text-gray-500">Email: </span>
                            <span class="text-gray-500">{{ $tenant->email }}</span>
                        </p>

                        <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                            <span class="text-gray-500">Property: </span>
                            <span class="text-gray-500">{{ $show->property ? $show->property->name : '' }}</span>
                        </p>

                        <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                            <span class="text-gray-500">Unit: </span>
                            <span class="text-gray-500">{{ $show->unit ? $show->unit->unit_name : 'Not assing' }}</span>
                        </p>

                        <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                            <span class="text-gray-500">Last rent paid: </span>
                            <span class="text-gray-500">N/A</span>
                        </p>

                        <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                            <span class="text-gray-500">Current rent: </span>
                            <span class="text-gray-500">
                                {{ $show->unit_id ? App\Models\Unit::current_rent($tenant->tenant_id, $show->property_id, $show->unit_id) . ' Tk' : '0 Tk' }}
                            </span>
                        </p>

                        <p class="flex items-center justify-between gap-3 bg-gray-100 py-2 px-2 rounded">
                            <span class="text-gray-500">Previous Due: </span>
                            <span class="text-gray-500">3000Tk</span>
                        </p>
                    </div>
                    <a href="@route('tenant.show', $tenant->tenant_id)" class=" btn btn-primary w-full">View Details</a>
                </div>

            </div>

            {{-- property information --}}
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class=" my-5" src="/images/{{ $show->property ? $show->property->image : '' }}"
                             alt="Card image cap">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{$show->property ? $show->property->name : ""}}</h5>
                          <div class="card-text">
                            <span class="flex items-center justify-between"><span>Property unit name:</span> <span>{{$show->unit ? $show->unit->unit_name : ""}}</span></span> <hr>
                            <span class="flex items-center justify-between"><span>Property unit number:</span> <span>{{$show->property ? $show->property->total_unit : ""}}</span></span> <hr>
                            <span class="flex items-center justify-between"><span>Property location:</span> <span>{{$show->property ? $show->property->address : ""}}</span></span> <hr>
                    
                          </div>
                          <p class="card-text">{{$show->property ? $show->property->description : ""}}.</p>
                        </div>
                      </div>
                    </div>
                  </div>


            </div>
        </div>

    </div>

</div><!-- End Card with header and footer -->




@section('js')
@endsection
@endsection
