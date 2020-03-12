@extends('layout.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">List Transaction</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Transaction Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $items)
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td>{{ $items->name }}</td>
                                        <td>{{ $items->email }}</td>
                                        <td>{{ $items->number }}</td>
                                        <td>$ {{ $items->transaction_total }}</td>
                                        <td>
                                            @if ($items->transaction_status == "PENDING")
                                                <span class="badge badge-info">
                                            @elseif($items->transaction_status == "SUCCESS")
                                                <span class="badge badge-success">
                                            @elseif($items->transaction_status == "FAILED")
                                                 <span class="badge badge-danger">
                                            @endif
                                            {{ $items->transaction_status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($items->transaction_status=='PENDING')
                                                <a href="{{ route('transactions.status',$items->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </a>                                                
                                                <a href="{{ route('transactions.status',$items->id) }}?status=FAILED" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </a> 
                                               
                                            @endif
                                            <a 
                                                href="#mymodal" 
                                                data-remote="{{ route('transactions.show',$items->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Transaction {{ $items->uuid }}" 
                                                class="btn btn-info btn-sm"
                                                >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('transactions.edit',$items->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('transactions.destroy',$items->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
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
    </div>
@endsection