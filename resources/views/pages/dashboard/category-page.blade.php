@extends('layout.sidenav-layout')

{{-- components/category/listing/details/delete --}}

@section('content')
    @include('components.category.category-list')
    @include('components.category.category-create')
    @include('components.category.category-update')
    @include('components.category.category-delete')
@endSection

{{-- end: components/category/listing/details/delete --}}
