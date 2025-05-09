@extends('layouts.app')

@section('title', 'iSHOP - Pridaj Produkt')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/admin_add/styles.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <form class="row g-4" method="POST" action="{{ route('admin.store_product') }}" enctype="multipart/form-data">
            @csrf

            <!-- Left Column -->
            <div class="col-md-6">
                <input type="text" class="form-control mb-3 rounded-pill" placeholder="Meno produktu">
                <textarea class="form-control rounded-4" rows="6" placeholder="Popis produktu"></textarea>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <!-- Category -->
                <select name="category_id" class="form-select mb-3 rounded-pill">
                    <option selected disabled>Kategória</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>

                <!-- Color -->
                <select name="color_id" class="form-select mb-3 rounded-pill">
                    <option selected disabled>Farba</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                    @endforeach
                </select>

                <!-- Brand -->
                <select name="brand_id" class="form-select mb-3 rounded-pill">
                    <option selected disabled>Značka</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                    @endforeach
                </select>

                <!-- Price and Quantity -->
                <input name="price" type="number" step="0.01" class="form-control mb-3 rounded-pill" placeholder="Cena">
                <input name="stockQuantity" type="number" class="form-control mb-3 rounded-pill" placeholder="Skladom ks">

                <!-- File Input -->
                <div class="mb-3">
                    <label for="productPhotos" class="btn btn-outline-dark rounded-pill">Pridať fotky</label>
                    <input name="images[]" type="file" class="form-control d-none" id="productPhotos" accept="image/*" multiple>
                </div>

                <!-- Image Previews -->
                <div id="previewContainer" class="d-flex flex-wrap gap-2 mb-3"></div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary rounded-pill button_color">Pridať produkt</button>
            </div>
        </form>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('pages/admin_add/scripts.js') }}"></script>
@endsection