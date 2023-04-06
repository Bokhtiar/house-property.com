@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Permission List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Permission list',
    'anotherPageIcon' => 'bi bi-plus',
    'anotherPageUrl' => 'permission.create',
])
@endcomponent

{{-- content --}}

<!-- table resource show componemts -->
@component('components.table.table', [
    
    'data' => $permissions,
    'id' => 'id',
    'route' => 'permission',
    'status' => false,

    'thead1' => 'Role', //if you want reletion another table must be assign in thead 1,2,3
    'reletion1' => 'role', //easir loading reletion name
    'reletion1Field_name' => 'name', //this is reletion field thatway i am not use tdata1
])
@endcomponent

@endsection
