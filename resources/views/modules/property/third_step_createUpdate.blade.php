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
        'location' => true,
        'unit' => true,
        'rent' => false,
    ])
    @endcomponent

    {{-- property first step --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        <h2 class="card-title">Add units</h2>
  

        @if (@$update)
            <form action="{{ url('property/third/step/update', @$properties->property_id) }}" method="POST" enctype="multipart/form-data"
                class="form-group row">
                @csrf
                @method('PUT')
            @else
                <form action="{{ url('property/third/step/store') }}" method="POST" enctype="multipart/form-data"
                    class="form-group row">
                    @csrf
                    @method('POST')
        @endif


            @for ($i = 0; $i < $properties->total_unit; $i++)


                {{-- unit --}}
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @component('components.input', [
                        'label' => 'Unit name.',
                        'type' => 'text',
                        'name' => 'unit_name[]',
                        'placeholder' => 'Unit A',
                        'required' => false,
                        'value' => @$edit ? @$edit[$i]['unit_name'] : @$update[$i]['unit_name'],
                    ])
                    @endcomponent
                </div>

                {{-- bedroom --}}
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @component('components.input', [
                        'label' => 'Bed Room.',
                        'type' => 'number',
                        'name' => 'bedroom[]',
                        'placeholder' => '0',
                        'required' => false,
                        'value' => @$edit ? @$edit[$i]['bedroom'] : @$update[$i]['bedroom'],
                    ])
                    @endcomponent
                </div>

                {{-- baths --}}
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @component('components.input', [
                        'label' => 'Baths.',
                        'type' => 'number',
                        'name' => 'baths[]',
                        'placeholder' => '0',
                        'required' => false,
                        'value' => @$edit ? @$edit[$i]['baths'] : @$update[$i]['baths'],
                    ])
                    @endcomponent
                </div>

                {{-- kitchen --}}
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @component('components.input', [
                        'label' => 'Kitchen.',
                        'type' => 'number',
                        'name' => 'kitchen[]',
                        'placeholder' => '0',
                        'required' => false,
                        'value' => @$edit ? @$edit[$i]['kitchen'] : @$update[$i]['kitchen'],
                    ])
                    @endcomponent
                </div>
            @endfor



            {{-- button --}}
            <div class="d-flex ">
                @component('components.primary-button', [
                    'name' => 'Location save && go to next',
                ])
                @endcomponent

                @if (@$update)
                    <a href="{{ url('property/second/step/edit',@$properties->property_id) }}">Pre</a>
                @else
                    <a href="{{ url('property/second/step') }}">Pre</a>
                @endif

            </div>

        </form>
    </section>
@endsection
