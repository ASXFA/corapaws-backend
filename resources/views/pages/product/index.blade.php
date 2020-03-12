@extends('layout.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $items)
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td>{{ $items->name }}</td>
                                        <td>{{ $items->type }}</td>
                                        <td>{{ $items->price }}</td>
                                        <td>{{ $items->quantity }}</td>
                                        <td>
                                            <a href="{{ route('products.gallery',$items->id) }}" class="btn btn-info btn-sm"><i class="fa fa-picture-o"></i></a>
                                            <a href="{{ route('products.edit',$items->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('products.destroy',$items->id) }}" method="post" class="d-inline">
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