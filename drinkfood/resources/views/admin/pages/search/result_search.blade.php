@extends('admin.layouts.master_layout')

@section('title', trans('message.manager_product'))

@section('content_title', trans('message.list_searchs'))
    
@section('content')
    {{-- @php
        echo "<pre>";
        print_r($searchResult);
        echo "</pre>";
    @endphp --}}
    @foreach($searchResult->groupByType() as $type => $modelSearchResults)
        @if ($type == 'products')
        <h2>{{ trans("message.product") }}</h2>
        @elseif($type == 'categories')
        <h2>{{ trans("message.category") }}</h2>
        @else
        <h2>{{ trans("message.user") }}</h2>
        @endif

        <div class="row">
        @foreach($modelSearchResults as $result)
        @php
            if($type == 'products')  
            {
                $url = url('/admin/product'.'/'.$result->searchable['uid']);
                $desc = $result->searchable['description'];
            }
            if($type == 'categories')  
            {
                $url = "javascript:void(0)";
                $desc = $result->searchable['description'];
            }
            if($type == 'users'){
                $url = url('/admin/user'.'/'.$result->searchable['uid']);
                $desc = $result->searchable['email'];
            }
        @endphp
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h5>{{ $result->title }}</h5>
                <p>{{$desc}}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{$url}}" class="small-box-footer">{{ trans('message.detail') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endforeach
        </div>
    @endforeach

@endsection