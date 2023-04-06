<div class="card">
    <div class="card-body">
        
        <h5 class="card-title">{{ @$title }} </h5>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    @isset($thead0)
                        <th scope="col">{{ $thead0 }}</th>
                    @endisset
                    @isset($thead1)
                        <th scope="col">{{ $thead1 }}</th>
                    @endisset

                    @isset($thead2)
                        <th scope="col">{{ $thead2 }}</th>
                    @endisset

                    @isset($thead3)
                        <th scope="col">{{ $thead3 }}</th>
                    @endisset

                    @isset($thead4)
                        <th scope="col">{{ $thead4 }}</th>
                    @endisset

                    @if ($status == true)
                        <th scope="col">Status</th>
                    @endif
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($data as $item)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        @isset($image_path)
                            <td> <img height="100" width="100" src="{{ $image_path }}{{ $item->$tdata0 }}"
                                    alt=""></td>
                        @endisset

                        @isset($reletion1)
                            <td scope="col">
                                {{ @$reletion1 ? ($item->$reletion1 ? $item->$reletion1->$reletion1Field_name : 'data not found') : '' }}
                            </td>
                        @endisset

                        @isset($reletion2)
                            <td scope="col">
                                {{ @$reletion2 ? ($item->$reletion2 ? $item->$reletion2->$reletion2Field_name : 'data not found') : '' }}
                            </td>
                        @endisset

                        @isset($reletion3)
                            <td scope="col">
                                {{ @$reletion3 ? ($item->$reletion3 ? $item->$reletion3->$reletion3Field_name : 'data not found') : '' }}
                            </td>
                        @endisset

                        @isset($reletion4)
                            <td scope="col">
                                {{ @$reletion4 ? ($item->$reletion4 ? $item->$reletion4->$reletion4Field_name : 'data not found') : '' }}
                            </td>
                        @endisset

                        @isset($tdata1)
                            <td scope="col">{{ $item->$tdata1 }}</td>
                        @endisset

                        @isset($tdata2)
                            <td scope="col">{{ $item->$tdata2 }}</td>
                        @endisset

                        @isset($tdata3)
                            <td scope="col">{{ $item->$tdata3 }}</td>
                        @endisset

                        @isset($tdata4)
                            <td scope="col"> {{ $item->$tdata4 }} </td>
                        @endisset

                        @if (@$status == true)
                            <td>
                                @if ($item->status == 1)
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route($route . '.status', $item->$id) }}"><i
                                            class="bi bi-check-circle"></i></a>
                                @else
                                    <a class="btn btn-warning btn-sm" href="@route($route . '.status', $item->$id)"><i
                                            class="bi bi-exclamation-triangle"></i></a>
                                @endif
                            </td>
                        @endif

                        <td class="form-inline">
                           
                                <a class="btn btn-sm btn-info text-light" href="@route($route . '.show', $item->$id)"> <i
                                        class="ri-eye-fill"></i></a>
                          
                                <a class="btn btn-sm btn-primary" href="@route($route . '.edit', $item->$id)"> <i
                                        class="ri-edit-box-fill"></i></a>
                           
                                <form method="POST" action="@route($route . '.destroy', $item->$id)" class="mt-1">
                                    @csrf
                                    @method('Delete')
                                    <button class="btn btn-sm btn-danger" type="submit"> <i
                                            class="ri-delete-bin-6-fill"></i></button>
                                </form>
                           
                        </td>
                    </tr>
                @empty
                    <h2 class="bg-danger text-light text-center">{{ $title }} Is empty</h2>
                @endforelse
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>
