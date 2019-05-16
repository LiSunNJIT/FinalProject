@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your Answer</div>

                    <div class="card-body">

                        {{$question->body}}
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary float-right" href="{{ route('questions.edit',['id'=> $question->id])}}">
                            Like it!
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['questions.destroy', $question->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Don't Like It!
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary float-right"
                   href="{{ route('answers.create', ['question_id'=> $question->id])}}">
                              Give me Another Memory
                </a>
            </div>

            <div class="card-body">
                @forelse($question->answers as $answer)
                    <div class="card">
                        <div class="card-body">{{$answer->body}}</div>
                        <div class="card-footer">

                            <a class="btn btn-primary float-right"
                               href="{{ route('answers.show', ['question_id'=> $question->id,'answer_id' => $answer->id]) }}">
                                Check It!
                            </a>

                        </div>
                    </div>
                @empty
                    <div class="card">

                        <div class="card-body"> I am listening!</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection