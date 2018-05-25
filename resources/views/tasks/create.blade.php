@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    <div class="row">
        <div class="col-xs-12">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-md-8 col-sm-offset-2">
                    <div class="col-lg-6 col-lg-offset-3">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}

                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection