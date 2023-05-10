@extends('layouts.dashboard.app')
@section('content')

@section('title', 'bill List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Bill list',
    'anotherPageIcon' => 'bi bi-plus',
    'anotherPageUrl' => 'bill.create',
])
@endcomponent

{{-- content --}}

<!-- table resource show componemts -->
@component('components.table.table', [
    
    'data' => $bills,
    'id' => 'bill_id',
    'route' => 'bill',
    'status' => false,

    'thead1' => 'Property', //if you want reletion another table must be assign in thead 1,2,3
    'reletion1' => 'property', //easir loading reletion name
    'reletion1Field_name' => 'name', //this is reletion field thatway i am not use tdata1

    'thead2' => 'Unit', //if you want reletion another table must be assign in thead 1,2,3
    'reletion2' => 'unit', //easir loading reletion name
    'reletion2Field_name' => 'unit_name', //this is reletion field thatway i am not use tdata1

    'thead3' => 'Bill pay date',
    'tdata3' => 'bill_pay_date'
])
@endcomponent

@endsection
