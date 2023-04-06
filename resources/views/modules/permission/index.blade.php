@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Permission List')

@section('css')
@endsection




@component('components.bread-crumbs',[
    'pageTitle' => "Permission list",
    'anotherPageIcon' => "bi bi-plus",
    'anotherPageUrl' => "permission.create",
])

        
@endcomponent

<div class="card">
    <div class="card-body">
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $permission->role ? $permission->role->name : 'Data not found' }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="@route('permission.edit', $permission->id)">
                                            <i
                                    class="ri-edit-box-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
