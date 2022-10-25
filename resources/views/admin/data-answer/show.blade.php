@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('dataAnswer.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Back</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Answer Information</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>User Name</td>
                                    <td>:</td>
                                    <td>{{ $answer->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Votes</td>
                                    <td>:</td>
                                    <td>{{ $answer->vote }}</td>
                                </tr>
                                <tr>
                                    <td>Best Answer</td>
                                    <td>:</td>
                                    <td>
                                        @if ($answer->bestAnswer()->where('answer_id', $answer->id)->first() !== null)
                                            @if ($answer->bestAnswer()->where('answer_id', $answer->id)->first()['check'] == true)
                                                <i class="fa-solid fa-check" style="color: rgb(6, 211, 6); font-size: 20px;"></i>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date answer</td>
                                    <td>:</td>
                                    <td>{{ $answer->created_at->format('d F Y') }} at {{ $answer->created_at->format('H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr style="margin: -15px 0 5px 0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mt-5 mx-5 my-4 mb-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Answer Detail</h6>
    </div>
    <div class="card-body">
        <div class="card mb-3">
            <div class="card-body">
                {!! $answer->answer !!}
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end my-5 mx-5">
    <div>
        <form class="d-inline" action="{{ route('dataAnswer.destroy', $answer->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure ?')">
                Delete Answer
            </button>
        </form>
    </div>
</div>
@endsection