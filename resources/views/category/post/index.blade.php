@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ url($post->getPreviewImageLink()) }}" alt="blog post">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            @auth()
                                <div class="d-flex align-items-center">
                                    <span>{{ $post->liked_users_count }}</span>
                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        @if((auth()->user()->likedPosts->contains($post->id)))
                                            <button class="border-0 bg-transparent text-danger">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        @else
                                            <button class="border-0 bg-transparent">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            @endauth
                            @guest()
                                <div class="d-flex align-items-center">
                                    <span>{{ $post->liked_users_count }}</span>
                                    <i class="far fa-heart"></i>
                                </div>
                            @endguest
                        </div>
                        <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto " style="margin-top: -120px">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </div>

</main>
@endsection
