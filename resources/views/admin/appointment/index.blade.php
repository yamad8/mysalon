@extends('layouts.admin')
@section('title', '予約一覧')
@section('content')
<div class="container">
        <div class="row">
            <h2>@if($username){{$username}}様@endif　予約一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\AppointmentController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">日にち</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_date" value="{{ $cond_date }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">日にち</th>
                                <th width="5%">時間</th>
                                <th width="15%">パーマ</th>
                                <th width="15%">マツエク</th>
                                <th width="15%">眉</th>
                                <th width="15%">オプション</th>
                                <th width="17%">コメント</th>
                                <th width="8%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            @php
                              $perm = count($appointment->perms) ? $appointment->perms->first()->perm : "";
                              $extension = count($appointment->extensions) ? $appointment->extensions->first()->extension : "";
                              $eyebrow = count($appointment->eyebrows) ? $appointment->eyebrows->first()->eyebrow : "";
                              $option = count($appointment->options) ? $appointment->options->first()->option : "";
                            @endphp
                                <tr>
                                    <th>{{ $appointment->date }}</th>
                                    <td>{{ \Str::limit($appointment->time, 100) }}</td>
                                    <td>{{ \Str::limit($perm, 15) }}</td>
                                    <td>{{ \Str::limit($extension, 15) }}</td>
                                    <td>{{ \Str::limit($eyebrow, 15) }}</td>
                                    <td>{{ \Str::limit($option, 15) }}</td>
                                    <td>{{ \Str::limit($appointment->comment, 100) }}</td>
                                    <td>
                                        <div>
                                            <a class="btn btn-primary" href="{{ action('Admin\AppointmentController@detail', ['id' => $appointment->id]) }}">詳細</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
