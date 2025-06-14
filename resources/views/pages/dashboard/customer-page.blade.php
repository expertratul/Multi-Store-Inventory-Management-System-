@extends('layout.sidenav-layout')

{{-- components/customer/listing/details/delete --}}

@section('content')
    @include('components.customer.customer-list')
    @include('components.customer.customer-create')
    @include('components.customer.customer-update')
    @include('components.customer.customer-delete')
@endSection

{{-- components/customer/listing/details/delete --}}
