@extends('admin.main')

@section('content')
    @if (Session::has('customer_message'))
        <div class="alert alert-success" role="alert">{{Session::get('customer_message')}}</div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Status</th>
            <th>Ngày Đặt hàng</th>
            <th colspan="2" class="text-center">Trạng Thái</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{$customer->status}}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $customer->id }}, '/admin/customers/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="min-width: 4.5rem;">
                            <li><a href="#" wire:click.prevent="updateCustomerStatus({{$customer->id}},'delivered')">Delivered</a></li>
                            <li><a href="#" wire:click.prevent="updateCustomerStatus({{$customer->id}},'canceled')">Canceled</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $customers->links() !!}
    </div>
@endsection


