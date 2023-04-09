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


    @component('components.property_breadcrumbs', [
        'home' => 'home',
        'location' => false,
        'unit' => false,
        'rent' => false,
    ])
        
    @endcomponent

@endsection
