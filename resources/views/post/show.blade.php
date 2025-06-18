@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $post->formatted_date }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset($post->getPreviewImageLink()) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            </section>
            <section>
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
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset($relatedPost->getPreviewImageLink()) }}" alt="related post" class="post-thumbnail">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <h5 class="post-title"><a href="{{ route('post.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a></h5>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section class="comment-list">
                        <h2 class="section-title mb-3" data-aos="fade-up">Комментарии {{ $post->comments_count == 0 ? '' : ($post->comments_count) }}</h2>
                        @foreach($post->comments as $comment)
                            <div class="media mb-4 p-3 border rounded shadow-sm">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1 d-flex justify-content-between align-items-center">
                                        <span>{{ $comment->user->name }}</span>
                                        <small class="text-muted">{{ $comment->formatted_date }}</small>
                                    </h6>
                                    <p class="mb-0">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </section>
                    @auth
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Комментарий</label>
                                        <textarea name="content" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Добавить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
