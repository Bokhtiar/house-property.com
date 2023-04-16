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
    @component('components.tenant_breadcrumbs', [
        'tenant' => true,
        'home' => true,
        'document' => false,
    ])
    @endcomponent

    {{-- tenent first step --}}

    @if (@$update)
        <form action="{{ url('tenant/second/step/update', @$update->tenant_id) }}" method="POST" enctype="multipart/form-data"
            class="form-group ">
            @csrf
            @method('PUT')
        @else
            <form action="{{ url('tenant/second/step/store') }}" method="POST" enctype="multipart/form-data"
                class="form-group ">
                @csrf
                @method('POST')
    @endif
    {{-- property select && unit select --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        <div class="row">
            {{-- property name --}}
            <div class="col-sm-12 col-md-6 col-lg-6">
                @component('components.select', [
                    'id' => 'property_id',
                    'name' => 'property_id',
                    'resource' => $properties,
                    'field_id' => 'property_id',
                    'label' => 'Select property',
                    'field_name' => 'name',
                    'value' => @$edit ? @$edit->property_id : '',
                ])
                @endcomponent
            </div>


            {{-- unit name --}}
            <div class="col-sm-12 col-md-6 col-lg-6">
                @component('components.select', [
                    'id' => 'unit_id',
                    'name' => 'unit_id',
                    'resource' => $units,
                    'field_id' => 'unit_id',
                    'label' => 'Select property',
                    'field_name' => 'unit_name',
                    'value' => @$edit ? @$edit->unit_id : '',
                ])
                @endcomponent
            </div>

            {{-- lease on start  --}}
            <div class="col-sm-12 col-md-6 col-lg-6">
                @component('components.input', [
                    'label' => 'Lease start date.',
                    'type' => 'date',
                    'name' => 'lease_start_date',
                    'placeholder' => 'lease start date',
                    'required' => true,
                    'value' => @$edit ? $edit->lease_start_date : @$update->lease_start_date,
                ])
                @endcomponent
            </div>


            {{-- lease on end  --}}
            <div class="col-sm-12 col-md-6 col-lg-6">
                @component('components.input', [
                    'label' => 'Lease end date.',
                    'type' => 'date',
                    'name' => 'lease_end_date',
                    'placeholder' => 'lease end date',
                    'required' => true,
                    'value' => @$edit ? $edit->lease_end_date : @$update->lease_end_date,
                ])
                @endcomponent
            </div>
        </div>
    </section>

    {{-- property information show --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        {{-- present address --}}
        <section class="row">

            <h5 class="card-title px-3">Rent information</h5>
            {{-- general_rent --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'general_rent.',
                    'type' => 'text',
                    'name' => 'general_rent',
                    'placeholder' => '0',
                    'required' => false,
                    'value' => @$edit ? $edit->general_rent : @$update->general_rent,
                ])
                @endcomponent
            </div>


            {{-- security_deposit --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'security_deposit.',
                    'type' => 'text',
                    'name' => 'security_deposit',
                    'placeholder' => '0',
                    'required' => false,
                    'value' => @$edit ? $edit->security_deposit : @$update->security_deposit,
                ])
                @endcomponent
            </div>


            {{-- late_fee --}}
            <div class="col-sm-12 col-md-2 col-lg-2">
                @component('components.input', [
                    'label' => 'Late fee.',
                    'type' => 'text',
                    'name' => 'late_fee',
                    'placeholder' => '0',
                    'required' => false,
                    'value' => @$edit ? $edit->late_fee : @$update->late_fee,
                ])
                @endcomponent
            </div>


            {{-- incident_recipt --}}
            <div class="col-sm-12 col-md-2 col-lg-2">
                @component('components.input', [
                    'label' => 'Incident recipt.',
                    'type' => 'text',
                    'name' => 'incident_recipt',
                    'placeholder' => '0',
                    'required' => false,
                    'value' => @$edit ? $edit->incident_recipt : @$update->incident_recipt,
                ])
                @endcomponent
            </div>

            {{-- payment_due_on_date --}}
            <div class="col-sm-12 col-md-2 col-lg-2">
                @component('components.input', [
                    'label' => 'Payment due on date.',
                    'type' => 'text',
                    'name' => 'payment_due_on_date',
                    'placeholder' => '0',
                    'required' => false,
                    'value' => @$edit ? $edit->payment_due_on_date : @$update->payment_due_on_date,
                ])
                @endcomponent
            </div>

        </section>
    </section>

    {{-- button --}}
    <div class="d-flex ">
        @component('components.primary-button', [
            'name' => 'Tenant information save',
        ])
        @endcomponent

    </div>

    </form>



@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output')
            output.src = URL.createObjectURL(event.target.files[0])
        }
    </script>
@endsection
@endsection
