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
        'document' => true,
    ])
    @endcomponent

    {{-- tenent first step --}}
    <section class="bg-white py-3 my-3 px-4 rounded-lg shadow">
        @if (@$update)
            <form action="{{ url('tenant/third/step/update', @$update->tenant_id) }}" method="POST"
                enctype="multipart/form-data" class="form-group row">
                @csrf
                @method('PUT')
            @else
                <form action="{{ url('tenant/third/step/store') }}" method="POST" enctype="multipart/form-data"
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


        {{-- pdf --}}
        <div class="form-group">
            <label>Select pdf document</label>
            <input type="file" required name="document" class="form-control">
        </div>



        {{-- button --}}
        <div class="d-flex ">
            @component('components.primary-button', [
                'name' => 'Tenant information save',
            ])
            @endcomponent
        </div>

    </section>

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
