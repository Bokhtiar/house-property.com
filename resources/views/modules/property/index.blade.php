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

    <section class="card">
        <div class="row">
            @foreach ($properties as $item)
                <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                    <div class="card py-3" style="width: 22rem">
                        {{-- {{$item->image != null ? ' <img class="card-img-top" src="/images/{{$item->image}}" alt="Card image cap"> ' : "s" }} --}}
                        @if ($item->image)
                        <img style="height: 200px; width: 100%" class="h-200px" src="/images/{{$item->image}}" />
                        @else
                        <img style="height: 200px; width: 100%" src="https://i.pinimg.com/originals/27/05/9e/27059e0adc375ad5a21629b4a76e7500.jpg" alt="">
                        @endif 
                        <div class="card-body">
                            <div class="flex justify-between items-center ">
                                <h5 class="card-title">{{$item->name}}</h5>
                               <i class="ri-more-2-line"></i>
                            </div>
                          
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </section>
    
</section>
    @section('js')
    @endsection
@endsection
