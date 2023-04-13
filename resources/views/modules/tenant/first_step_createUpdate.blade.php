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
        'home' => false,
        'document' => false,
    ])
    @endcomponent

    {{-- tenent first step --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        @if (@$update)
            <form action="{{ url('tenant/first/step/update', @$update->tenant_id) }}" method="POST"
                enctype="multipart/form-data" class="form-group row">
                @csrf
                @method('PUT')
            @else
                <form action="{{ url('tenant/first/step/store') }}" method="POST" enctype="multipart/form-data"
                    class="form-group row">
                    @csrf
                    @method('POST')
        @endif

        {{-- first name --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'First name.',
                'type' => 'text',
                'name' => 'first_name',
                'placeholder' => 'xaiem ',
                'required' => true,
                'value' => @$edit ? $edit->first_name : @$update->first_name,
            ])
            @endcomponent
        </div>

        {{-- last name --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'last name.',
                'type' => 'text',
                'name' => 'last_name',
                'placeholder' => ' keye',
                'required' => true,
                'value' => @$edit ? $edit->last_name : @$update->last_name,
            ])
            @endcomponent
        </div>

        {{-- contact number --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Contact number.',
                'type' => 'number',
                'name' => 'contact_number',
                'placeholder' => '+880 1638 107 361',
                'required' => true,
                'value' => @$edit ? $edit->contact_number : @$update->contact_number,
            ])
            @endcomponent
        </div>


        {{-- job --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Job.',
                'type' => 'string',
                'name' => 'job',
                'placeholder' => 'govt.',
                'required' => true,
                'value' => @$edit ? $edit->job : @$update->job,
            ])
            @endcomponent
        </div>


        {{-- age --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Age.',
                'type' => 'number',
                'name' => 'age',
                'placeholder' => '40',
                'required' => false,
                'value' => @$edit ? $edit->age : @$update->age,
            ])
            @endcomponent
        </div>


        {{-- familly member --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Familly member.',
                'type' => 'number',
                'name' => 'familly_member',
                'placeholder' => '4',
                'required' => true,
                'value' => @$edit ? $edit->familly_member : @$update->familly_member,
            ])
            @endcomponent
        </div>

        {{-- email --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Email.',
                'type' => 'string',
                'name' => 'email',
                'placeholder' => 'william@gmail.com',
                'required' => true,
                'value' => @$edit ? $edit->email : @$update->email,
            ])
            @endcomponent
        </div>


        {{-- password --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'Password.',
                'type' => 'password',
                'name' => 'password',
                'placeholder' => '12345678',
                'required' => true,
                'value' => @$edit ? $edit->password : @$update->password,
            ])
            @endcomponent
        </div>

        {{-- previce address --}}
        <section class="row">
            <h5 class="card-title px-3">Previous Address</h5>

            {{-- address --}}
            <div class="col-sm-12 col-md-12 col-lg-12">
                @component('components.input', [
                    'label' => 'Address.',
                    'type' => 'text',
                    'name' => 'p_address',
                    'placeholder' => 'Daffodil smart city, 1205, dhaka',
                    'required' => false,
                    'value' => @$edit ? $edit->p_address : @$update->p_address,
                ])
                @endcomponent
            </div>

            {{-- country --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'Country.',
                    'type' => 'text',
                    'name' => 'p_country',
                    'placeholder' => 'Bangladesh',
                    'required' => false,
                    'value' => @$edit ? $edit->p_country : @$update->p_country,
                ])
                @endcomponent
            </div>


            {{-- state --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'State.',
                    'type' => 'text',
                    'name' => 'p_state',
                    'placeholder' => 'Dhak',
                    'required' => false,
                    'value' => @$edit ? $edit->p_state : @$update->p_state,
                ])
                @endcomponent
            </div>


            {{-- city --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'City.',
                    'type' => 'text',
                    'name' => 'p_city',
                    'placeholder' => 'saver',
                    'required' => false,
                    'value' => @$edit ? $edit->p_city : @$update->p_city,
                ])
                @endcomponent
            </div>


            {{-- zip_code --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'Zip-code.',
                    'type' => 'number',
                    'name' => 'p_zip_code',
                    'placeholder' => '3530',
                    'required' => false,
                    'value' => @$edit ? $edit->p_zip_code : @$update->p_zip_code,
                ])
                @endcomponent
            </div>

        </section>

        {{-- present address --}}
        <section class="row">
            <h5 class="card-title px-3">Present Address</h5>

            {{-- address --}}
            <div class="col-sm-12 col-md-12 col-lg-12">
                @component('components.input', [
                    'label' => 'Address.',
                    'type' => 'text',
                    'name' => 'present_address',
                    'placeholder' => 'Daffodil smart city, 1205, dhaka',
                    'required' => false,
                    'value' => @$edit ? $edit->present_address : @$update->present_address,
                ])
                @endcomponent
            </div>

            {{-- country --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'Country.',
                    'type' => 'text',
                    'name' => 'present_country',
                    'placeholder' => 'Bangladesh',
                    'required' => false,
                    'value' => @$edit ? $edit->present_country : @$update->present_country,
                ])
                @endcomponent
            </div>


            {{-- state --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'State.',
                    'type' => 'text',
                    'name' => 'present_state',
                    'placeholder' => 'dhaka',
                    'required' => false,
                    'value' => @$edit ? $edit->present_state : @$update->present_state,
                ])
                @endcomponent
            </div>


            {{-- city --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'City.',
                    'type' => 'text',
                    'name' => 'present_city',
                    'placeholder' => 'saver',
                    'required' => false,
                    'value' => @$edit ? $edit->present_city : @$update->present_city,
                ])
                @endcomponent
            </div>


            {{-- zipcode --}}
            <div class="col-sm-12 col-md-3 col-lg-3">
                @component('components.input', [
                    'label' => 'zip-code.',
                    'type' => 'text',
                    'name' => 'present_zip_code',
                    'placeholder' => '5634',
                    'required' => false,
                    'value' => @$edit ? $edit->present_zip_code : @$update->present_zip_code,
                ])
                @endcomponent
            </div>

        </section>




        {{-- button --}}
        <div class="d-flex ">
            @component('components.primary-button', [
                'name' => 'Tenant information save',
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
