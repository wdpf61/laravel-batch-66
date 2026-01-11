@extends('layout.erp.app')
@section('content')
    <x-alert />
    <h3>Customer List</h3>


    <form action="{{ URL('customer') }}" method="GET">
        <div class="mb-3">
            <input value="{{ request('search') }}" type="text" class="form-control" id="search" name="search"
                placeholder="Search data">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>



    @can("CustomerCreate")
      <x-button :url="URL('customer/create')" type="primary">Create Customer</x-button>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">photo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>

                    {{-- <td> <img src="{{asset("storage" )}}/{{$customer->photo}}" alt="" srcset="" width="100">       </td> --}}
                    <td> <img src="{{ asset('storage/photo/customer') }}/{{ $customer->photo }}" alt=""
                            srcset="" width="100"> </td>
                    <td class="btn btn-group">

                        @can('updateCustomer', $customer)
                            <a class="btn btn-secondary" href="{{ URL('customer/edit', $customer->id) }}">Edit</a>
                        @endcan



                        @can('delete_customer', $customer)
                            <form action="{{ URL('customer/delete', $customer->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm(`Are you sure`)" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        @endcan

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="">
        {{ $customers->appends(request()->query())->links() }}
    </div>
@endsection
