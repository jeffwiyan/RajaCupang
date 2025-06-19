@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Katalog Ikan Cupang</h2>

  <form method="GET" class="mb-4">
    <div class="row">
      <div class="col-md-4">
        <select name="category" class="form-select">
          <option value="">Semua Jenis</option>
          @foreach ($categories as $cat)
            <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <select name="sort" class="form-select">
          <option value="">Urutkan Harga</option>
          <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Termurah</option>
          <option value="termahal" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Termahal</option>
        </select>
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary w-100">Filter</button>
      </div>
    </div>
  </form>

  <div class="row">
    @forelse($products as $product)
      <div class="col-md-3 mb-4">
        <div class="card h-100 d-flex flex-column">
          <div class="card-img-wrapper text-center p-3">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="max-height: 150px; object-fit: contain;">
          </div>
          <div class="card-body flex-grow-1 d-flex flex-column justify-content-between">
            <div>
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">Rp{{ number_format($product->price) }}</p>
            </div>
            <div class="mt-3">
              @if($product->stock > 0)
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary mb-2 w-100">
                  Lihat Detail
                </a>
              @else
                <span class="badge bg-danger mb-2 text-center w-100">Stok Habis</span>
              @endif

              @auth
                <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
                  @csrf
                  <button class="btn btn-outline-danger btn-sm w-100" type="submit">
                    <i class="fa{{ auth()->user()->wishlist->contains($product->id) ? 's' : 'r' }} fa-heart"></i>
                    {{ auth()->user()->wishlist->contains($product->id) ? 'Hapus dari Wishlist' : 'Tambah ke Wishlist' }}
                  </button>
                </form>
              @endauth
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center">Produk tidak ditemukan.</p>
    @endforelse
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1">Previous</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}</a>
      </li>
      <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
      </li>
    </ul>
  </nav>
</div>
@endsection
