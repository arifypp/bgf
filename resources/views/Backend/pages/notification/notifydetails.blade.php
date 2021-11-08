@extends ('Backend.layouts.main')
@section('title') Notification @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
    <div class="container">
            <div class="card">
            <div class="card-body direction-rtl">
                <p>{{ $notification->name }}</p>
                <div class="border-bottom border-top py-4">
                <p class="lead">{{ $notification->description }}</p>
                </div>
                <p class="mb-0 fz-12 mt-4"><i class="bi bi-clock mx-1"></i>
                    {{date('d M, Y h:i A', strtotime($notification->created_at))}}
                </p>
            </div>
            </div>
        </div>
    </div>
  @endsection