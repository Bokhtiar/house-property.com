@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Property List',
    'anotherPageIcon' => 'bi bi-add',
    'anotherPageUrl' => 'property.create',
])
@endcomponent
<section class="section">






    <section class="card">
        <div class="row p-3">

            @foreach ($tenants as $item)
                <div class="col-12 col-sm-3 col-lg-3 col-md-3 ">
                    <div class="card px-3 py-3" style="width: 22rem;">
                        {{-- name information --}}
                        <div class="flex items-center justify-between">
                            <div class="flex gap-2">
                                <img src="/images/{{$item->image}}" height="30px" width="70px" class="  rounded-full" alt="">
                                <p>
                                    <span>asdfsda</span><br>
                                    <span>019912121212</span>
                                </p>
                            </div>
                            <a href="">edit</a>
                        </div>

                        {{-- soft information --}}
                        <div class=" my-3">

                       
                        <p class="flex items-center gap-3">
                            <span>Email: </span>
                            <span class="text-gray-500">{{$item->email}}</span>
                        </p> 

                        <p class="flex items-center gap-3">
                            <span>Property: </span>
                            <span class="text-gray-500">{{$item->Property ? $item->property->name : ""}}</span>
                        </p> 

                        <p class="flex items-center gap-3">
                            <span>Unit: </span>
                            <span class="text-gray-500">{{$item->unit ? $item->unit->unit_name : ""}}</span>
                        </p> 

                        <p class="flex items-center gap-3">
                            <span class="">Last rent paid: </span>
                            <span class="text-gray-500">N/A</span>
                        </p> 

                        <p class="flex items-center gap-3">
                            <span>Current rent: </span>
                            <span class="text-gray-500">3000Tk</span>
                        </p> 

                        <p class="flex items-center gap-3">
                            <span>Previous Due: </span>
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
