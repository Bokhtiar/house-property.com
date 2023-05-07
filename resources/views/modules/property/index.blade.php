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
            @foreach ($properties as $item)
                <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                    <div class="card bg-light" style="width: 22rem">
                        {{-- image --}}
                        @if ($item->image)
                            <img style="height: 200px; width: 100%" class="h-200px" src="/images/{{ $item->image }}" />
                        @else
                            <img style="height: 200px; width: 100%"
                                src="https://i.pinimg.com/originals/27/05/9e/27059e0adc375ad5a21629b4a76e7500.jpg"
                                alt="">
                        @endif
                        <div class="card-body">
                            {{-- name and action --}}
                            <div class="flex justify-between items-center ">
                                <h5 class="card-title">{{ $item->name }}</h5>

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="ri-more-2-line"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li><a class="dropdown-item" href="@route('property.edit', $item->property_id)">Edit</a></li>
                                        <li><a class="dropdown-item" href="{{url('property/destroy', $item->property_id)}}">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- location --}}
                            <p class="flex items-center gap-2 "> <i class="bi bi-geo-alt-fill"></i> <span
                                    class="capitalize">{{ $item->address }}</span></p>

                            {{-- information  --}}
                            <div
                                class="flex items-center justify-between px-1 bg-white border border-gray-200 rounded h-10">
                                <p class="flex items-center gap-1 mt-3 text-gray-500 text-sm">
                                    <i class="text-gray-600 bx bx-home"></i>
                                    <span>{{$item->total_unit}} unit</span>
                                </p>

                                <p class="flex items-center gap-1 mt-3 text-gray-500 text-sm">
                                    <i class="ri-dashboard-line"></i>
                                    <span>{{App\Models\Unit::total_room($item->property_id)}} rooms</span>
                                </p>

                                <p class="flex items-center gap-1 mt-3 text-gray-500 text-sm">
                                    <i class="bi bi-check-circle"></i>
                                    <span>0 available</span>
                                </p>
                            </div>

                            <a href="@route('property.show', $item->property_id)" class="mt-4 btn btn-primary w-full">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</section>
@section('js')
@endsection
@endsection
