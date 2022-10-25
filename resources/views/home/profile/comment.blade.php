@extends('home.layouts.main')
@section('content')

    @include('home.profile.profile-picture')

    <div class="my-4">
        <a href="{{ route('user.index', [$user->id, $user->username]) }}" class="btn btn-sm btn-outline-secondary">Profile</a>
        <a href="{{ route('user.activity', [$user->id, $user->username]) }}" class="btn btn-sm btn-primary">Activity</a>
    </div>
    
    <div class="mt-4 row">
        <div class="col-md-2 col-12 activity-tab">
            @include('home.profile.activity-tab')
        </div>

        <div class="col-md-10 comment-box">
            <div class="col-md-12 col-12">
                <h5>Comment</h5>
                <div class="card">
                    <div class="card-body pt-0">

                        @if ($comments->first() == null)
                            <p class="m-0">Don't have comment record yet.</p>
                        @endif
                        @foreach ($comments as $comment)
                            <div class="user-comment row">
                                <div class="col-md-9 col-8">
                                    <a href="{{ route('answer.allComment', [$comment->answer->question_id, $comment->answer->question->slug, $comment->answer_id]) }}">{{ $comment->comment }}</a>
                                </div>
                                <div class="col-md-3 col-4 text-right">
                                    <p>{{ $comment->created_at->format('d F Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>

                <div class="mt-4 pagination">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection