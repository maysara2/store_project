{{-- @extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Payment | ' . env('APP_NAME'))

@section('content')

    <h1>All Payment</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Use</th>
                <th>Actions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($payments as $r)
                    <td>{{ $r->id}}</td>
                    <td>{{ $r->total }}</td>
                    <td>{{ $r->user_id }}</td>
                    <td>{{ $r->order_id }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('admin.users.destroy', $r->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop --}}
