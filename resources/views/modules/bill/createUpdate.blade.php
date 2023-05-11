@extends('layouts.dashboard.app')
@section('title', 'Bill create')

@section('content')

    {{-- bradcrumbs --}}
    @component('components.bread-crumbs', [
        'pageTitle' => 'Bill create',
        'anotherPageIcon' => 'bi bi-list',
        'anotherPageUrl' => 'bill.index',
    ])
    @endcomponent

    {{-- bill --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        @if (@$edit)
            <form action="@route('bill.update', @$edit->bill_id)" method="POST" enctype="multipart/form-data" class="form-group row">
                @csrf
                @method('PUT')
            @else
                <form action="@route('bill.store')" method="POST" enctype="multipart/form-data" class="form-group row">
                    @csrf
                    @method('POST')
        @endif

        {{-- property --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.select', [
                'id' => 'property_id',
                'name' => 'property_id',
                'resource' => $properties,
                'field_id' => 'property_id',
                'label' => 'Select property',
                'field_name' => 'name',
                'value' => @$edit ? @$edit->property_id : @$update->property_id,
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
                'value' => @$edit ? @$edit->unit_id : @$update->unit_id,
            ])
            @endcomponent
        </div>

        {{-- bill_pay_date --}}
        <div class="col-sm-12 col-md-12 col-lg-12">
            @component('components.input', [
                'label' => 'Bill pay date.',
                'type' => 'date',
                'name' => 'bill_pay_date',
                'placeholder' => '',
                'required' => true,
                'value' => @$edit ? $edit->bill_pay_date : @$update->bill_pay_date,
            ])
            @endcomponent
        </div>

        {{-- note --}}
        <div class="col-sm-12 col-md-12 col-lg-12">
            <label for="">Bill note</label>
            <textarea class="form-control" name="note" id="" cols="30" rows="10">{{ @$edit ? @$edit->notes : "" }}</textarea>
        </div>

    </section>
    {{-- button --}}
    <div class="d-flex ">
        @component('components.primary-button', [
            'name' => 'Bill information save',
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
