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
        'rent' => true,
    ])
    @endcomponent

    {{-- property first step --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        @if (@$update)
            <form action="{{ url('property/fourth/step/update',$property_id) }}" method="POST" enctype="multipart/form-data"
                class="form-group row">
                @csrf
                @method('put')
            @else
                <form action="{{ url('property/fourth/step/store') }}" method="POST" enctype="multipart/form-data"
                    class="form-group row">
                    @csrf
                    @method('POST')
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Default Accordion</h5>

                <!-- Default Accordion -->
                <div class="accordion" id="accordionExample">
                    @foreach ($units as $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{ $item['unit_name'] }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse {{ $loop->index == 0 ? 'show' : '' }}"
                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body row">

                                    <input type="hidden" name="unit_id[]" value="{{ $item['unit_id'] }}" id="">
                                    {{-- general rent --}}
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        @component('components.input', [
                                            'label' => 'General Rent.',
                                            'type' => 'number',
                                            'name' => 'general_rent[]',
                                            'placeholder' => '0.0',
                                            'required' => false,
                                            'value' => @$edit ? @$edit[$loop->index]['general_rent'] : @$update[$loop->index]['general_rent'],
                                        ])
                                        @endcomponent
                                    </div>

                                    {{-- general rent --}}
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        @component('components.input', [
                                            'label' => 'Security deposit.',
                                            'type' => 'number',
                                            'name' => 'security_deposit[]',
                                            'placeholder' => '0.0',
                                            'required' => false,
                                            'value' => @$edit[$loop->index]['security_deposit'] ?? 0,
                                        ])
                                        @endcomponent
                                    </div>

                                    {{-- late fee --}}
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        @component('components.input', [
                                            'label' => 'Late fee.',
                                            'type' => 'number',
                                            'name' => 'late_fee[]',
                                            'placeholder' => '0.0',
                                            'required' => false,
                                            'value' => @$edit[$loop->index]['late_fee'] ?? 0,
                                        ])
                                        @endcomponent
                                    </div>

                                    {{-- incident_receipt --}}
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        @component('components.input', [
                                            'label' => 'Incident receipt.',
                                            'type' => 'number',
                                            'name' => 'incident_receipt[]',
                                            'placeholder' => '0.0',
                                            'required' => false,
                                            'value' => @$edit[$loop->index]['incident_receipt'] ?? 0,
                                        ])
                                        @endcomponent
                                    </div>
                                </div>
                                {{-- rent type --}}
                                <div class="accordion-body">

                                    <input type="checkbox" name="rent_type[]" value="monthly" checked
                                        {{ @$edit[$loop->index]['rent_type'] == 'monthly' ? 'checked' : '' }}> Monthly


                                    <input type="checkbox" name="rent_type[]" value="yearly"
                                        {{ @$edit[$loop->index]['rent_type'] == 'yearly' ? 'checked' : '' }}> yearly
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div><!-- End Default Accordion Example -->
            </div>
        </div>

        {{-- button --}}
        <div class="d-flex ">
            @component('components.primary-button', [
                'name' => 'Property information save',
            ])
            @endcomponent

            @if (@$update)
                <a href="{{ url('property/third/step/edit', $property_id) }}">Pre</a>
            @else
                <a href="{{ url('property/third/step') }}">Pre</a>
            @endif
        </div>

        </form>
    </section>
@endsection
