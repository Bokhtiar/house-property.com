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
        @if (@$update)
            <form action="{{ url('property/first/step/update', @$update->property_id) }}" method="POST" enctype="multipart/form-data"
                class="form-group row">
                @csrf
                @method('PUT')
            @else
                <form action="{{ url('property/first/step/store') }}" method="POST" enctype="multipart/form-data"
                    class="form-group row">
                    @csrf
                    @method('POST')
        @endif
        {{-- name --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Property name.',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'property name',
                'required' => true,
                'value' => @$edit ? $edit->name : @$update->name,
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
                'value' => @$edit ? $edit->total_unit : @$update->total_unit,
            ])
            @endcomponent
        </div>

        {{-- image --}}
        <div class="col-sm-12 col-md-2 col-lg-2">
            <div class=" bg-secondary text-white text-sm  border border-3 rounded">
                <input class="py-5 px-1" type="file" name="image" onchange="loadFile(event)" id="">
            </div>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-10">

            <img id="output" src="/images/{{ @$edit->image }}" style=" height:130px; width:230px;">

        </div>

        {{-- description --}}
        <div class="col-sm-12 col-md-12 col-lg-12">
            <label for="">Property description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ @$edit ? $edit->description : @$update->description }}</textarea>
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


@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output')
            output.src = URL.createObjectURL(event.target.files[0])
        }
    </script>
@endsection
@endsection
