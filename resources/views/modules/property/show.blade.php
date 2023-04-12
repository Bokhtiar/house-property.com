@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Role List')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Property show',
    'anotherPageIcon' => 'bi bi-list',
    'anotherPageUrl' => 'property.index',
])
@endcomponent



<div class="card">
    <div class="card-header flex justify-between items-center">
        <p>
            <span class="card-title">{{ $show->name }}</span> <br>
            <span><i class="bi bi-geo-alt-fill"></i> {{ $show->address }}</span>
        </p>
        <span>asdf</span>

    </div>
    <div class="card-body">
        <img class="mt-4 rounded h-1.5" src="/images/{{ $show->image }}" height="300px" width="100%" alt="">
        <h5 class="card-title">Description</h5>
        {{$show->description}}
    </div>
    <div class="card-footer">
        Footer
    </div>
</div><!-- End Card with header and footer -->




@section('js')
@endsection
@endsection
