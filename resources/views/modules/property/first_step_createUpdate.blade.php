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
        'home' => true,
        'location' => false,
        'unit' => false,
        'rent' => false,
    ])
    @endcomponent

    {{-- property first step --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        <form action="{{url('property/first/step/store')}}" method="POST" enctype="multipart/form-data" class="form-group row">
            @csrf
            @method('POST')
            
            {{-- name --}}
            <div class="col-sm-12 col-md-6 col-lg-6">
                @component('components.input', [
                    'label' => 'Property name.',
                    'type' => 'text',
                    'name' => 'name',
                    'placeholder' => 'property name',
                    'required' => true,
                    'value' => @$edit->name,
                ])
                @endcomponent
            </div>

            {{-- unit --}}
            <div class="col-sm-12 col-md-6 col-lg-6">
                @component('components.input', [
                    'label' => 'Property unit.',
                    'type' => 'number',
                    'name' => 'total_unit',
                    'placeholder' => 'property number of unit',
                    'required' => true,
                    'value' => @$edit->unit,
                ])
                @endcomponent
            </div>

            {{-- description --}}
            <div class="col-sm-12 col-md-12 col-lg-12">
                <label for="">Property description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>

            {{-- button --}}
            <div class="d-flex ">
                @component('components.primary-button', [
                    'name' => 'Property information save',
                ])
                @endcomponent
            </div>

        </form>
    </section>
@endsection
