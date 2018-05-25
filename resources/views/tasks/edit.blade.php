@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のメッセージ編集ページ</h1>
    

    <div class="row">
        <div class="col-xs-12">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-md-8 col-sm-offset-2">
                    <div class="col-lg-6 col-lg-offset-3">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection