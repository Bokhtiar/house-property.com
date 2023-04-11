@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Property create',
    'anotherPageIcon' => 'bi bi-plus',
    'anotherPageUrl' => 'property.create',
])
@endcomponent
<section class="section">
    <div class="row">
        
        <div class="col-lg-12">

            <!-- table resource show componemts -->
            @component('components.table.table', [
                'title' => 'List of role',
                'data' => $properties,
                'id' => 'property_id',
                'route' => 'property',
                'status' => false,
            
                'thead1' => 'Name',
                'tdata1' => 'name',

                'thead2' => 'Unit',
                'tdata2' => 'total_unit',
            ])
            @endcomponent

        </div>

    </div>
    @section('js')
    @endsection
@endsection
