@extends('layout.sidenav-layout')

{{-- components/invoice/listing/details/delete --}}

@section('content')
    @include('components.invoice.invoice-list')
    @include('components.invoice.invoice-details')
    @include('components.invoice.invoice-delete')
@endSection

{{-- end: components/invoice/listing/details/delete --}}
