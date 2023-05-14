@extends('layouts.dashboard.app')
@section('title', 'Maintainer create')

@section('content')

    {{-- bradcrumbs --}}
    @component('components.bread-crumbs', [
        'pageTitle' => 'Maintainer create',
        'anotherPageIcon' => 'bi bi-list',
        'anotherPageUrl' => 'maintainer.index',
    ])
    @endcomponent


    {{-- maintainer --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        @if (@$update)
            <form action="{{ url('maintainer/update', @$update->id) }}" method="POST" enctype="multipart/form-data"
                class="form-group row">
                @csrf
                @method('PUT')
            @else
                <form action="@route('maintainer.store')" method="POST" enctype="multipart/form-data"
                    class="form-group row">
                    @csrf
                    @method('POST')
        @endif
        {{-- image --}}
        <div class="col-sm-12 col-md-2 col-lg-2">
            <div class=" bg-secondary text-white text-sm  border border-3 rounded">
                <input class="py-5 px-1" type="file" name="image" onchange="loadFile(event)" id="">
            </div>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-10">
            <img id="output" src="/images/{{ @$edit->image }}" style=" height:130px; width:230px;">
        </div>

        {{-- name --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'maintainer name.',
                'type' => 'text',
                'name' => 'name',
                'placeholder' => 'maintainer name',
                'required' => true,
                'value' => @$edit ? $edit->name : @$update->name,
            ])
            @endcomponent
        </div>

        {{-- email --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'maintainer email.',
                'type' => 'email',
                'name' => 'email',
                'placeholder' => 'maintainer email',
                'required' => true,
                'value' => @$edit ? $edit->email : @$update->email,
            ])
            @endcomponent
        </div>

        {{-- phone --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            @component('components.input', [
                'label' => 'maintainer phone.',
                'type' => 'phone',
                'name' => 'phone',
                'placeholder' => 'maintainer phone',
                'required' => true,
                'value' => @$edit ? $edit->phone : @$update->phone,
            ])
            @endcomponent
        </div>

        {{-- property name --}}
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

        {{-- password --}}
        <div class="col-sm-12 col-md-12 col-lg-12">
            @component('components.input', [
                'label' => 'maintainer password.',
                'type' => 'password',
                'name' => 'password',
                'placeholder' => 'maintainer password',
                'required' => true,
                'value' => @$edit ? $edit->password : @$update->password,
            ])
            @endcomponent
        </div>

        

        {{-- button --}}
        <div class="d-flex ">
            @component('components.primary-button', [
                'name' => 'maintainer information save',
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
