@extends('layout.sidenav-layout')

{{-- components/product/list/create/update/delete --}}

@section('content')
    @include('components.product.product-list')
    @include('components.product.product-create')
    @include('components.product.product-update')
    @include('components.product.product-delete')
@endSection

{{-- end: components/product/list/create/update/delete --}}
