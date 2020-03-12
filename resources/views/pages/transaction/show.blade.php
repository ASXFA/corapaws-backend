<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $items->name }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $items->number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $items->address }}</td>
    </tr>
    <tr>
        <th>Transaction Total</th>
        <td>{{ $items->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status Transaction</th>
        <td>{{ $items->transaction_status }}</td>
    </tr>
    <tr>
        <th>Purchasing Product</th>
        <td>
            <table class="table table-bordered w-100">
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                @foreach ($items->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>$ {{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status',$items->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> SET SUCCESS
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status',$items->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i> SET FAILED
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status',$items->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> SET PENDING
        </a>
    </div>
</div>