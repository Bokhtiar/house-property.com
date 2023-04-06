@extends('layouts.dashboard.app')
@section('content')

@section('title', 'Permission create Form')

@section('css')
@endsection

{{-- bradcrumbs --}}
@component('components.bread-crumbs', [
    'pageTitle' => 'Permission create',
    'anotherPageIcon' => 'bi bi-list',
    'anotherPageUrl' => 'permission.index',
])
@endcomponent

<div class="card py-10 px-6">
    <form action="@route('permission.store')" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <select name="role_id" class="form-control mt-3 required:">
                        <option value="">Please select a role</option>
                        @foreach ($roles as $role)
                        
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>
            <div class="col-md-8">
                <table class=" table responsive-table-input-matrix ">
                    <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Add</th>
                            <th>Edit</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>List</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Roles</td>
                            <td><input type="checkbox" name="permission[role][add]" value="1"></td>
                            <td><input type="checkbox" name="permission[role][edit]" value="1"></td>
                            <td><input type="checkbox" name="permission[role][view]" value="1"></td>
                            <td><input type="checkbox" name="permission[role][delete]" value="1"></td>
                            <td><input type="checkbox" name="permission[role][list]" value="1"></td>

                        </tr>
                        <tr>
                            <td>Permissions</td>
                            <td><input type="checkbox" name="permission[permission][add]" value="1"></td>
                            <td><input type="checkbox" name="permission[permission][edit]" value="1"></td>
                            <td><input type="checkbox" name="permission[permission][view]" value="1"></td>
                            <td><input type="checkbox" name="permission[permission][delete]" value="1"></td>
                            <td><input type="checkbox" name="permission[permission][list]" value="1"></td>
                        </tr>
                        
                        <tr>
                            <td>Users</td>
                            <td><input type="checkbox" name="permission[user][add]" value="1"></td>
                            <td><input type="checkbox" name="permission[user][edit]" value="1"></td>
                            <td><input type="checkbox" name="permission[user][view]" value="1"></td>
                            <td><input type="checkbox" name="permission[user][delete]" value="1"></td>
                            <td><input type="checkbox" name="permission[user][list]" value="1"></td>
                        </tr>

                        <tr>
                            <td>Department</td>
                            <td><input type="checkbox" name="permission[department][add]" value="1"></td>
                            <td><input type="checkbox" name="permission[department][edit]" value="1"></td>
                            <td><input type="checkbox" name="permission[department][view]" value="1"></td>
                            <td><input type="checkbox" name="permission[department][delete]" value="1"></td>
                            <td><input type="checkbox" name="permission[department][list]" value="1"></td>
                        </tr>

                        

                    </tbody>
                </table>

                <div class="text-center my-3">
                    <button type="submit" class="btn btn-success">Permission Created</button>
                </div>
            </div>
        </div>

    </form>
</div>

@endsection
