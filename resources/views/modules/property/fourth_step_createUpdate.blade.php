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
        <form action="{{ url('property/fourth/step/store') }}" method="POST" enctype="multipart/form-data"
            class="form-group row">
            @csrf
            @method('POST')
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Default Accordion</h5>

                    <!-- Default Accordion -->
                    <div class="accordion" id="accordionExample">
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is hidden by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div> --}}
                        @foreach ($units as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{ $item['unit_name'] }}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse {{$loop->index == 0 ?'show' : ''}}" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body row">

                                        <input type="hidden" name="unit_id[]" value="{{ $item['unit_id'] }}"
                                            id="">
                                        {{-- general rent --}}
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            @component('components.input', [
                                                'label' => 'General Rent.',
                                                'type' => 'number',
                                                'name' => 'general_rent[]',
                                                'placeholder' => '0.0',
                                                'required' => false,
                                                'value' => @$edit[$loop->index]['general_rent'] ?? 0,
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
                                        
                                        <input type="checkbox" name="rent_type[]" value="monthly"
                                        checked  {{ @$edit[$loop->index]['rent_type'] == 'monthly' ? 'checked' : '' }}> Monthly


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
                <a href="{{ url('property/third/step') }}">Pre</a>
            </div>

        </form>
    </section>
@endsection
