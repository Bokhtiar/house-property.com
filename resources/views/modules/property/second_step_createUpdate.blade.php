@extends('layouts.dashboard.app')
@section('title', 'Property create')

@section('content')

    {{-- bradcrumbs --}}
    @component('components.bread-crumbs', [
        'pageTitle' => 'Property create',
        'anotherPageIcon' => 'bi bi-list',
        'anotherPageUrl' => 'property.index',
    ])
    @endcomponent


    {{-- property bread-crumbs --}}
    @component('components.property_breadcrumbs', [
        'home' => false,
        'location' => true,
        'unit' => false,
        'rent' => false,
    ])
    @endcomponent

    {{-- property first step --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">

        @if (@$update)
            <form action="{{ url('property/second/step/update', @$update->property_id) }}" method="POST" enctype="multipart/form-data"
                class="form-group row">
                @method('put')
            @else
                <form action="{{ url('property/second/step/store') }}" method="POST" enctype="multipart/form-data"
                    class="form-group row">
                    @method('POST')
        @endif
        @csrf
        {{-- country --}}
        <div class="col-sm-12 col-md-4 col-lg-4">
            @component('components.input', [
                'label' => 'country name.',
                'type' => 'text',
                'name' => 'country',
                'placeholder' => 'bangladesh',
                'required' => true,
                'value' => @$edit ? @$edit->country : @$update->country,
            ])
            @endcomponent
        </div>

        {{-- state --}}
        <div class="col-sm-12 col-md-4 col-lg-4">
            @component('components.input', [
                'label' => 'State.',
                'type' => 'text',
                'name' => 'state',
                'placeholder' => 'Dhaka',
                'required' => true,
                'value' => @$edit ? @$edit->state : @$update->state,
            ])
            @endcomponent
        </div>

        {{-- state --}}
        <div class="col-sm-12 col-md-4 col-lg-4">
            @component('components.input', [
                'label' => 'City.',
                'type' => 'text',
                'name' => 'city',
                'placeholder' => 'Saver',
                'required' => true,
                'value' => @$edit ? @$edit->city : @$update->city,
            ])
            @endcomponent
        </div>

        {{-- state --}}
        <div class="col-sm-12 col-md-4 col-lg-4">
            @component('components.input', [
                'label' => 'Zip code.',
                'type' => 'text',
                'name' => 'zip_code',
                'placeholder' => '3570',
                'required' => true,
                'value' => @$edit ? @$edit->zip_code : @$update->zip_code,
            ])
            @endcomponent
        </div>

        {{-- state --}}
        <div class="col-sm-12 col-md-8 col-lg-8">
            @component('components.input', [
                'label' => 'Address',
                'type' => 'text',
                'name' => 'address',
                'placeholder' => 'dottopara,saver,dhaka, bangladesh',
                'required' => true,
                'value' => @$edit ? @$edit->address : @$update->address,
            ])
            @endcomponent
        </div>

        {{-- map link --}}
        <div class="col-sm-12 col-md-12 col-lg-12">
            @component('components.input', [
                'label' => 'Map link',
                'type' => 'text',
                'name' => 'map_link',
                'placeholder' => '',
                'required' => true,
                'value' => @$edit ? @$edit->map_link : @$update->map_link,
            ])
            @endcomponent
        </div>


        {{-- button --}}
        <div class="d-flex ">
            @component('components.primary-button', [
                'name' => 'Location save && go to next',
            ])
            @endcomponent
             @if (@$update)
                <a href="@route('property.edit', @$update->property_id)">Pres</a>    
                @else
                <a href="{{ url('property/first/step/prev') }}">Prse</a>
                @endif
            

        </div>

        </form>
    </section>
@endsection
