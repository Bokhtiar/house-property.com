@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Property List',
    'anotherPageIcon' => 'bi bi-plus',
    'anotherPageUrl' => 'property.create',
])
@endcomponent
<section class="section">






    <section class="card">
        <div class="row p-3">

            @foreach ($tenants as $item)
                <div class="col-12 col-sm-3 col-lg-3 col-md-3 ">
                    <div class="card px-3 py-3" style="width: 22rem;">
                        {{-- name image email --}}

                        <img src="/images/{{ $item->image }}" height="70px" width="70px" class="mx-auto  rounded-full"
                            alt="">
                      
                            <span class="text-center">{{ $item->first_name . ' ' . $item->last_name }}</span>
                            <span class="text-center">{{ $item->contact_number }}</span>
                            <p class="text-center">
                                <a href="{{url('tenant/first/step/edit', $item->tenant_id)}}" class="btn btn-sm btn-success"><i class="ri-edit-box-fill"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i
                                        class="ri-delete-bin-6-fill"></i></a>
                                
                            </p>
             



                        {{-- soft information --}}
                        <div class=" my-3">
                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Email: </span>
                                <span class="text-gray-500">{{ $item->email }}</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Property: </span>
                                <span class="text-gray-500">{{ $item->Property ? $item->property->name : '' }}</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Unit: </span>
                                <span class="text-gray-500">{{ $item->unit ? $item->unit->unit_name : '' }}</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Last rent paid: </span>
                                <span class="text-gray-500">N/A</span>
                            </p>

                            <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Current rent: </span>
                                <span class="text-gray-500">3000Tk</span>
                            </p>

                            <p class="flex items-center justify-between gap-3 bg-gray-100 py-2 px-2 rounded">
                                <span class="text-gray-500">Previous Due: </span>
                                <span class="text-gray-500">3000Tk</span>
                            </p>
                        </div>
                        <a href="@route('property.show', $item->property_id)" class=" btn btn-primary w-full">View Details</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

</section>
@section('js')
@endsection
@endsection
