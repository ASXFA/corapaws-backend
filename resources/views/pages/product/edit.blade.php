@extends('layout.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Update Products </strong>
            <small>{{ $item->id }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input  type="text" 
                            name="name"
                            value="{{ old('name') ? old('name') : $item->name }}"
                            class="form-control @error('name') is_invalid @enderror">
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Type</label>
                    <input  type="text" 
                            name="type"
                            value="{{ old('type') ? old('type') : $item->type }}"
                            class="form-control @error('type') is_invalid @enderror">
                    @error('type') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea   name="description"
                                class="ckeditor form-control @error('description') is_invalid @enderror">{{ old('description') ? old('description') : $item->description }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Price</label>
                    <input  type="number" 
                            name="price"
                            value="{{ old('price') ? old('price') : $item->price }}"
                            class="form-control @error('price') is_invalid @enderror">
                    @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Quantity</label>
                    <input  type="number" 
                            name="quantity"
                            value="{{ old('quantity') ? old('quantity') : $item->quantity }}"
                            class="form-control @error('quantity') is_invalid @enderror">
                    @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Go Update !</button>
                </div>
            </form>
        </div>
    </div>
@endsection