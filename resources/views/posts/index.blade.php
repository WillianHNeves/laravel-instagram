@extends('layouts.app')

@section('title', '| Dashboard')

@section('content')
    @include('components.navbar');
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center" style="margin-top:80px">
        
        @foreach ($posts as $post)
            
            <div class="card mb-3" style="width: 600px;">
                <div class="card-header bg-white border-0">
                    <span class="fw-bold"> {{ $post->user->name }} </span>
                </div>

                <img src="{{ $post->image }}" class="card-image">

                <div class="card-body">
                    <button class="btn" onclick="sendLike({{ $post->id }}, this)">
                        
                        @if ($user->postsLiked()->where('post_id', $post->id)->count() > 0)
                            <i class="bi bi-heart-fill text-danger fs-4"></i>
                        @else
                            <i class="bi bi-heart fs-4"></i>
                        @endif
                        
                    </button>
                    <p class="card-text"> 
                        {{ $post->description }}
                    </p>

                </div>

            </div>

        @endforeach

    </div>
@endsection

@push('scripts')


    <script>
        function sendLike(id, el) {
            $.ajax({
                url: '/posts/like/' + id,
            }).done(function (response){
                //console.log(response);
                
                if (response.like) {
                    $(el).html('<i class="bi bi-heart-fill text-danger fs-4"></i>');
                    return;
                }
                $(el).html('<i class="bi bi-heart fs-4"></i>');

            });
        }
    </script>
@endpush