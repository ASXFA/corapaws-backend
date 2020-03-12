@extends('layout.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Add New Product Photos</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('productGalleries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Products ID</label>
                    <select name="products_id"
                            class="form-control @error('products_id') is_invalid @enderror">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>

                        @endforeach
                    
                    </select>
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Photo</label>
                    <input  type="file" 
                            name="photo"
                            accept="image/*"
                            value="{{ old('photo') }}"
                            required
                            class="form-control @error('photo') is_invalid @enderror">
                    @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <br>
                    <label>
                        <input  type="radio" 
                                name="is_default"
                                value="1"
                                class=" @error('is_default') is_invalid @enderror"> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input  type="radio" 
                                name="is_default"
                                value="0"
                                class="@error('is_default') is_invalid @enderror"> Tidak
                    </label>
                    @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Go Upload !</button>
                </div>
            </form>
        </div>
    </div>
@endsection