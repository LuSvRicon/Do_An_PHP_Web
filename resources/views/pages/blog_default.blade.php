@extends('layout')

@section('content')
<!-- page-header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li>Blog Default</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page-header-->
<!-- blog -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="isotope">
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post-masonry ">
                    <div class="post-block">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <div class="meta">
                            <span class="meta-date">{{ $post->created_at->format('d M, Y') }}</span>
                            <span>|&nbsp; &nbsp;</span>
                            <span class="meta-admin">By {{ $post->author->name }}</span>
                        </div>
                        <div class="post-img">
                            <img src="{{ asset('public/frontend/images/' . $post->image) }}" alt="" class="img-responsive">
                        </div>
                        <div class="post-content">
                            <p>{{ \Illuminate\Support\Str::limit($post->content, 100, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="st-pagination">
                <ul class="pagination">
                    <li><a href="#" aria-label="previous"><span aria-hidden="true">Trang trước</span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true">Trang sau</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- blog -->
@endsection
