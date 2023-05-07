@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Tenant show',
    'anotherPageIcon' => 'bi bi-list',
    'anotherPageUrl' => 'property.index',
])
@endcomponent



@component('components.tenent_header',[
    'profile' => true,
])
    
@endcomponent


@section('js')
@endsection
@endsection
