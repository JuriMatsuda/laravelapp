@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
    @parent
    詳細ページ
@endsection

@section('content')
    @if ($items != null)
        @foreach($items as $item)
            <table width="400px">
                <tr>
                    <th width="50px">id:</th>
                    <td width="50px">{{$item->id}}</td>
                </tr>
                <tr>
                    <th width="50px">name:</th>
                    <td>{{$item->name}}</td>
                </tr>
                {{--<tr>--}}
                {{--<th>mail:</th>--}}
                {{--<td>{{$item->mail}}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<th>age:</th>--}}
                {{--<td>{{$item->age}}</td>--}}
                {{--</tr>--}}
            </table>
        @endforeach
    @endif
@endsection

@section('footer')
    copyright 2018 nchaaa.
@endsection
