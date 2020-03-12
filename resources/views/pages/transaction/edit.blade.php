@extends('layout.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Update Transaction </strong>
            <small>{{ $item->uuid }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transactions.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-label">Customer Name</label>
                    <input  type="text" 
                            name="name"
                            value="{{ old('name') ? old('name') : $item->name }}"
                            class="form-control @error('name') is_invalid @enderror">
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input  type="email" 
                            name="email"
                            value="{{ old('email') ? old('email') : $item->email }}"
                            class="form-control @error('email') is_invalid @enderror">
                    @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="number" class="form-control-label">Number</label>
                    <input  type="text" 
                            name="number"
                            value="{{ old('number') ? old('number') : $item->number }}"
                            class="form-control @error('number') is_invalid @enderror">
                    @error('number') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-label">Address </label>
                    <input  type="text" 
                            name="address"
                            value="{{ old('address') ? old('address') : $item->address }}"
                            class="form-control @error('address') is_invalid @enderror">
                    @error('address') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Go Update !</button>
                </div>
            </form>
        </div>
    </div>
@endsection