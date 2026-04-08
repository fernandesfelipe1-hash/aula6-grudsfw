@props([
    'titulo' => '',
    'breadcrumb_pages' => []
])

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $titulo }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb_pages AS $label => $url)
                        @if ($loop->last)
                            <li class="breadcrumb-item active">{{$label}}</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $url }}">{{$label}}</a></li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
