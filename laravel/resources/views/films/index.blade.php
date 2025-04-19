{{-- resources/views/films/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zoznam filmov</title>
    <style>
      /* Jednoduché štýly na lepšiu čitateľnosť */
      table { width: 100%; border-collapse: collapse; }
      th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
      .pagination { margin-top: 20px; }
      .pagination a, .pagination span {
        display: inline-block; padding: 6px 12px; margin-right: 4px;
        border: 1px solid #ddd; text-decoration: none; color: #333;
      }
      .pagination .active span { background: #333; color: #fff; }
      .pagination .disabled span { color: #aaa; border-color: #eee; }
    </style>
</head>
<body>

<h1>Zoznam filmov</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Názov</th>
            <th/Rok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($films as $film)
        <tr>
            <td>{{ $film->id }}</td>
            <td>
                <a href="{{ route('films.show', ['id' => $film->id]) }}">{{ $film->title }}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{-- Predchádzajúca stránka --}}
    @if ($films->onFirstPage())
        <span class="disabled">Previous</span>
    @else
        <a href="{{ $films->previousPageUrl() }}">Previous</a>
    @endif

    {{-- Aktuálna stránka --}}
    <span class="active"><span>{{ $films->currentPage() }}</span></span>

    {{-- Nasledujúca stránka --}}
    @if ($films->hasMorePages())
        <a href="{{ $films->nextPageUrl() }}">Next</a>
    @else
        <span class="disabled">Next</span>
    @endif
</div>

</body>
</html>
