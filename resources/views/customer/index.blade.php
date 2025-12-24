@extends('layout.erp.app')
@section('content')
    <x-alert />
    <h3>Customer List</h3>


    <form action="{{URL("customer")}}" method="GET">
        <div class="mb-3">
            <input value="{{request("search")}}" type="text" class="form-control" id="search" name="search" placeholder="Search data">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>




    <x-button :url="URL('customer/create')" type="primary">Create Customer</x-button>

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
                <x-customertable :customer="$customer" />
            @endforeach
        </tbody>
    </table>

    <div class="">
        {{ $customers->appends(request()->query())->links() }}
    </div>
@endsection
