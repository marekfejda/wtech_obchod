@extends('layouts.app')

@section('title', 'iSHOP - Uprav Produkt')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('pages/admin_edit/styles.css') }}">
@endsection

@section('content')
	<script>
	window.initialFiles = {!! json_encode(
		$product->images->map(function ($img) {
		return [
			'uid' => $img->uid,
			'src'  => asset($img->path),
		];
		})
	) !!};
	</script>
	@if (session('success'))
        <div id="flash-message" class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function () {
                let el = document.getElementById('flash-message');
                if (el) {
                    el.style.transition = 'opacity 0.5s ease';
                    el.style.opacity = 0;
                    setTimeout(() => el.remove(), 500);
                }
            }, 3000); // 3 sekundy
        </script>
    @endif

	<div class="container my-5 px-3 px-sm-5">
		<form id="editProductForm" class="row g-4" method="POST" action="{{ route('admin.update_product', $product->id) }}" enctype="multipart/form-data" novalidate>
            @csrf

			<!-- Left Column -->
			<div class="col-md-6">
				<input id="name" type="text" name="name" class="form-control mb-3 rounded-pill" placeholder="Meno produktu" value="{{ $product->name }}">
				<textarea id="short_description" name="short_description" class="form-control mb-3 rounded-4" rows="6" placeholder="Titulný popis produktu">{{ $product->short_description }}</textarea>
                <textarea id="description" name="description" class="form-control mb-3 rounded-4" rows="6" placeholder="Popis produktu">{{ $product->description }}</textarea>
			</div>

			<!-- Right Column -->
			<div class="col-md-6">
				<!-- Category -->
                <select id="category_id" name="category_id" class="form-select mb-3 rounded-pill">
					@foreach($categories as $category)
						<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
							{{ $category->category }}
						</option>
					@endforeach
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>

                <!-- Color -->
                <select id="color_id" name="color_id" class="form-select mb-3 rounded-pill">
                    @foreach($colors as $color)
						<option value="{{ $color->id }}" {{ $product->color_id == $color->id ? 'selected' : '' }}>
							{{ $color->color }}
						</option>
					@endforeach
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                    @endforeach
                </select>

                <!-- Brand -->
                <select id="brand_id" name="brand_id" class="form-select mb-3 rounded-pill">
					@foreach($brands as $brand)
						<option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
							{{ $brand->brand }}
						</option>
					@endforeach
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                    @endforeach
                </select>

				<!-- Price and Quantity -->
                <input id="price" name="price" type="number" step="0.01" class="form-control mb-3 rounded-pill" min="0" placeholder="Cena" value="{{ $product->price }}">
                <input id="stockQuantity" name="stockQuantity" type="number" class="form-control mb-3 rounded-pill" min="0" placeholder="Skladom ks" value="{{ $product->stockquantity }}">	

				<!-- File Input -->
				<div class="mb-3">
					<label for="productPhotos" class="btn btn-outline-dark rounded-pill">Pridať fotky</label>
					<input name="images[]" type="file" class="form-control d-none" id="productPhotos" accept="image/*" multiple>
				</div>

				<!-- Image Previews -->
				<div id="previewContainer" class="d-flex flex-wrap gap-2 mb-3"></div>

				<!-- Submit Button -->
				<div class="text-end">
					<button type="submit" class="btn btn-primary rounded-pill button_color">Upraviť produkt</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('page-js')
    <script src="{{ asset('pages/admin_edit/scripts.js') }}"></script>
@endsection