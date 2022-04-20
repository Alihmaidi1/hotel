@extends('template.master')
@section('title', 'Customer')
@section('content')
    <style>
        .mybg {
            background-image: linear-gradient(#1975d1, #1975d1);
        }

        .numbering {
            width: 50px;
            height: 50px;
            align-items: center;
            justify-content: center;
            padding-top: 12px;
            text-align: center;
            border-bottom-right-radius: 30px;
            border-top-left-radius: 5px;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: -10px;
            color: #212529
        }

    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-2 mb-2">
                <div class="col-lg-6 mb-2">
                    <a href="{{ route("customer.create") }}" class="btn btn-sm shadow-sm myBtn border rounded">
                        <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="black">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </a>
                </div>
                <div class="col-lg-6 mb-2">
                    <form class="d-flex" method="GET" action="{{ route('customer.index') }}">
                        <input class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search" id="search"
                            name="search" value="{{ request()->input('search') }}">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="vertical-align: middle" class="table text-center table-hover" style="white-space: nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">address</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">job</th>
                                            <th scope="col">birthDate</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
             

            @forelse ($customers as $customer)
                                            <tr>
                                                <td scope="row">
                                                    {{-- {{ ($customers->currentpage() - 1) * $customers->perpage() + $loop->index + 1 }} --}}
                                                </td>
                                                <td><img style="width:80px;height:80px" src="{{ asset("upload/customer/".$customer->avatar) }}"/></td>
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->address }}</td>
                                                <td>{{ $customer->gender }}</td>
                                                <td>{{ $customer->job }}</td>
                                                <td>{{ $customer->birthDate }}</td>

                                                <td>
                                                    <a class="btn btn-light btn-sm rounded shadow-sm border p-0 m-0"
                                                        href=""
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                                                        <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form class="btn btn-sm p-0 m-0" method="POST"
                                                        id="delete-post-form-customer-{{ $customer->id }}"
                                                        action="{{ route("customer.delete",$customer->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-light btn-sm rounded shadow-sm border p-0 m-0 delete"
                                                            href="#" user-id="{{ $customer->id }}" user-role="Customer"
                                                            user-name="{{ $customer->name }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete User">
                                                            <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </a>
                                                    </form>
                                                   
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    There's no data in this table
                                                </td>
                                            </tr>
                                        @endforelse   
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            
            </div>
            <div class="row justify-content-md-center mt-3">
                <div class="col-sm-10 d-flex justify-content-md-center">
                    {{-- {{ $customers->onEachSide(2)->links('template.paginationlinks') }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
<script>
    $('.delete').click(function() {
        var customer_id = $(this).attr('customer-id');
        var customer_name = $(this).attr('customer-name');
        var customer_url = $(this).attr('customer-url');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: customer_name + " will be deleted, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel! ',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                id = "#delete-customer-form-" + customer_id
                console.log(id)
                $(id).submit();
            }
        })
    });

</script>
@endsection
