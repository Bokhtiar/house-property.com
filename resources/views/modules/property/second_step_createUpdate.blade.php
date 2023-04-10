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
        <form action="{{url('property/second/step/store')}}" method="POST" enctype="multipart/form-data" class="form-group row">
            @csrf
            @method('POST')

            {{-- country --}}
            <div class="col-sm-12 col-md-4 col-lg-4">
                @component('components.input', [
                    'label' => 'country name.',
                    'type' => 'text',
                    'name' => 'country',
                    'placeholder' => 'bangladesh',
                    'required' => true,
                    'value' => @$edit->country,
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
                    'value' => @$edit->state,
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
                    'value' => @$edit->city,
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
                    'value' => @$edit->zip_code,
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
                    'value' => @$edit->address,
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
                    'value' => @$edit->map_link,
                ])
                @endcomponent
            </div>


            {{-- button --}}
            <div class="d-flex ">
                @component('components.primary-button', [
                    'name' => 'Location save && go to next',
                ])
                @endcomponent
                <a href="{{url('property/first/step/prev')}}">Pre</a>
                
            </div>

        </form>
    </section>
@endsection
