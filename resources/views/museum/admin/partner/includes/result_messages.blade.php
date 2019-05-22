<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>



@php /** @var \Illuminate\Support\ViewErrorBag $errors*/ @endphp
@if($errors->any())
    <div class="row justify-content-center notification-block">
        <div class="col-md-11">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row justify-content-center success-block">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <div>{{ session()->get('success') }}</div>
            </div>
        </div>
    </div>
@endif


<script>



    $(document).ready(function () {
        $('.success-block').fadeIn(2000).fadeOut(2000, function(){$(this).remove()});
    });


</script>