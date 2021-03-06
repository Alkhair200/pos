@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.clients')</h1>
            <ol class="breadcrumb">
            <li><a href="{{--route('dashboard.welcome')--}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                {{-- <li><a href="{{route('dashboard.clients.orders.index')}}">@lang('site.orders')</a></li> --}}
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.add') {{--<small>Quick Exapm</small>--}}</h3>
                </div> <!----End box of header----->
                <div class="box-body">
                    
                    @include('partials._errors')

                    <form action="{{route('dashboard.clients.store')}}" method="POST">
                        @csrf
                        {{method_field('post')}}

                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                </div>

                                @for ($i = 0; $i < 2; $i++)
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone[]" class="form-control">
                                        </div>
                                @endfor

                                <div class="form-group">
                                    <label>@lang('site.address')</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                                </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class=" fa fa-plus">@lang('site.add')</i></button>
                            </div>
                    </form>    

            </div><!-- end of box body -->
        </section>
    </div>
@endsection