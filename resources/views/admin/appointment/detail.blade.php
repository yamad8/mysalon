@extends('layouts.admin')
@section('title', '予約情報の詳細')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予約情報の詳細</h2>
                <form action="{{ action('Admin\AppointmentController@detail') }}" method="get" enctype="multipart/form-data">
                    <hr color="#c0c0c0">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label for="date" class="col-md-5">日にち</label>
                        <p class="col-md-5">{{ $appointment->date }}</p>
                        <div class="col-md-10">
                            <input class="form-control" name="date" value="{{ $appointment->date }}" type="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-md-5">時間</label>
                        <p class="col-md-5">{{ $appointment->time }}</p>
                        <div class="col-md-10">
                            <input class="form-control" name="time" value="{{ $appointment->time }}" type="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perm" class="col-md-5">まつ毛パーマ</label>
                        <div class="col-md-5">
                            @if ($appointment->perms != null)
                                @foreach($appointment->perms as $perm)
                                    <p>{{$perm->perm}}</p>
                                 @endforeach
                            @endif
                       </div>
                    </div>
                    <div class="form-group row">
                        <label for="extension" class="col-md-5">マツエク</label>
                        <div class="col-md-5">
                            @if ($appointment->extensions != null)
                                @foreach($appointment->extensions as $extension)
                                    <p>{{$extension->extension}}</p>
                                 @endforeach
                            @endif
                       </div>
                    </div>
                    <div class="form-group row">
                        <label for="eyebrow" class="col-md-5">眉</label>
                        <div class="col-md-5">
                             @if ($appointment->eyebrows != null)
                                @foreach($appointment->eyebrows as $eyebrow)
                                    <p>{{$eyebrow->eyebrow}}</p>
                                 @endforeach
                            @endif
                       </div>
                    </div>
                    <div class="form-group row">
                        <label for="option" class="col-md-5">オプション</label>
                        <div class="col-md-5">
                            @if ($appointment->options != null)
                                @foreach($appointment->options as $option)
                                    <p>{{$option->option}}</p>
                                 @endforeach
                            @endif
                       </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5" for="comment">コメント</label>
                        <p class="col-md-5">{{ $appointment->comment }}</p>
                     </div>
                     <hr color="#c0c0c0">
                    <div class="check-button">
                      <div class="btn-toolbar">
                        <div class="return-btn">
                            <a class="btn btn-primary" href={{ route('index') }}>一覧へもどる</a>
                        </div>
                        <div class="btn-group ml-auto">
                          <a class="btn btn-secondary" href="{{ action('Admin\AppointmentController@edit', ['id' => $appointment->id]) }}">編集</a>
                       </div>
                       <div class="btn-group ml-auto">
                          <a class="btn btn-danger" href="{{ action('Admin\AppointmentController@delete', ['id' => $appointment->id]) }}">削除</a>
                       </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection