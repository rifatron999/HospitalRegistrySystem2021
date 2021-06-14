@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Trial version ended |  © https://github.com/rifatron999  | Service Unavailable '))
