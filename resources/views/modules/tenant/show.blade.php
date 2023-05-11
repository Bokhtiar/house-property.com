@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Tenant show',
    'anotherPageIcon' => 'bi bi-list',
    'anotherPageUrl' => 'property.index',
])
@endcomponent



<!-- Default Tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">  <i class="bi bi-emoji-smile-fill"></i>  Profile</button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-house-fill"></i> Home details</button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-credit-card-2-front-fill"></i> Payment info</button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="document-tab" data-bs-toggle="tab" data-bs-target="#document" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-credit-card-2-front-fill"></i> Documents</button>
      </li>
  </ul>

  <div class="tab-content pt-2" id="myTabContent">
    {{-- first step --}}
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
        <div class="col-12 col-sm-3 col-lg-3 col-md-3 ">
            <div class="card px-3 py-3" style="width: 22rem;">
                {{-- name image email --}}

                <img src="/images/{{ $show->image }}" height="70px" width="70px" class="mx-auto  rounded-full"
                    alt="">

                <span class="text-center">{{ $show->first_name . ' ' . $show->last_name }}</span>
                <span class="text-center">{{ $show->contact_number }}</span>
                <div class="text-center flex items-center justify-center gap-2 ">
                    <a href="{{ url('tenant/first/step/edit', $show->tenant_id) }}"
                        class="btn btn-sm btn-success"><i class="ri-edit-box-fill"></i></a>

                <form action="@route('tenant.destroy', $show->tenant_id)" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i
                            class="ri-delete-bin-6-fill"></i></button>
                </form>
                </div>

                {{-- soft information --}}
                <div class=" my-3">
                    <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                        <span class="text-gray-500">Email: </span>
                        <span class="text-gray-500">{{ $show->email }}</span>
                    </p>

                    <p class="flex justify-between items-center gap-3 bg-gray-100 py-2 px-2 rounded">
                        <span class="text-gray-500">Property: </span>
                        <span class="text-gray-500">{{ $show->Property ? $show->property->name : 'Not assing' }}</span>
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
                        <span class="text-gray-500"> {{$show->unit_id ? App\Models\Unit::current_rent($show->tenant_id, $show->property_id, $show->unit_id).' Tk' : "0 Tk"}} </span>
                    </p>

                    <p class="flex items-center justify-between gap-3 bg-gray-100 py-2 px-2 rounded">
                        <span class="text-gray-500">Previous Due: </span>
                        <span class="text-gray-500">3000Tk</span>
                    </p>
                </div>
                <a href="@route('tenant.show', $show->tenant_id)" class=" btn btn-primary w-full">View Details</a>
            </div>
        </div>
    
    </div>

    {{-- 2nd step --}}
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col-12 col-sm-12 col-md-4 col-lg-3">
            <div class="card bg-light" style="width: 22rem">
                {{-- image --}}
                @if ($show->property_id)
                    <img style="height: 200px; width: 100%" class="h-200px" src="/images/{{ $show->property ? $show->property->image : "" }}" />
                @else
                    <img style="height: 200px; width: 100%"
                        src="https://i.pinimg.com/originals/27/05/9e/27059e0adc375ad5a21629b4a76e7500.jpg"
                        alt="">
                @endif
                <div class="card-body">
                    {{-- name and action --}}
                    <div class="flex justify-between items-center ">
                        <h5 class="card-title">{{ $show->property ? $show->property->name : "" }}</h5>

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="ri-more-2-line"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><a class="dropdown-item" href="@route('property.edit', $show->property_id)">Edit</a></li>
                                <li><a class="dropdown-item" href="{{url('property/destroy', $show->property_id)}}">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- location --}}
                    <p class="flex items-center gap-2 "> <i class="bi bi-geo-alt-fill"></i> <span
                            class="capitalize">{{ $show->property ? $show->property->address : "" }}</span></p>

                    {{-- information  --}}
                    <div
                        class="flex items-center justify-between px-1 bg-white border border-gray-200 rounded h-10">
                        <p class="flex items-center gap-1 mt-3 text-gray-500 text-sm">
                            <i class="text-gray-600 bx bx-home"></i>
                            <span>{{$show->property ? $show->property->total_unit : ""}} unit</span>
                        </p>

                        <p class="flex items-center gap-1 mt-3 text-gray-500 text-sm">
                            <i class="ri-dashboard-line"></i>
                            <span>{{App\Models\Unit::total_room($show->property_id)}} rooms</span>
                        </p>

                        <p class="flex items-center gap-1 mt-3 text-gray-500 text-sm">
                            <i class="bi bi-check-circle"></i>
                            <span>{{App\Models\Unit::total_available_room($show->property_id)}} available</span>
                        </p>
                    </div>

                    <a href="@route('property.show', $show->property_id)" class="mt-4 btn btn-primary w-full">View Details</a>
                </div>
            </div>
        </div>
    </div>

    {{-- 3rd step --}}
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      
    </div>

    <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
        <img src="/images/{{ $show->image }}" height="70px" width="70px" class=""
        alt="">
        <a href="">Download pdf</a>
      </div>
  </div><!-- End Default Tabs -->


@section('js')
@endsection
@endsection
