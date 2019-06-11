
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>--}}
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">--}}



    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    {{--<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>--}}
    {{--<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/datetime/jquery.datetimepicker.css')}}"/>
    <script src="{{asset('css/datetime/jquery.js')}}"></script>
    <script src="{{asset('css/datetime/jquery.datetimepicker.full.js')}}"></script>





</head>


@php
    /** @var \App\Models\Post $item*/
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if((\Carbon\Carbon::parse($item->start_date) > \Carbon\Carbon::now() && $item->end_date == null)|| \Carbon\Carbon::parse($item->end_date) < \Carbon\Carbon::now())
                    Прошедшее, ожидаемое
                @else
                    Текущее
                @endif
            </div>
            <div class="card-body admin-theme admin-card-field admin-table-text">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active admin-table-text" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" id="title" type="text" value="{{old('title',$item->title)}}"
                                   class="form-control admin-theme admin-field admin-table-text" minlength="3" required/>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description"
                                      class="form-control admin-theme admin-field admin-table-text" rows="20">{{old('description', $item->description)}}</textarea>
                        </div>
                    </div>




                    {{--<input data-date-format="mm/dd/yyyy" id="datepicker" width="276" />--}}
                    <input id="datetimepicker" type="text" value="{{old('start_date', $item->start_date)}}">


                    <div class="form-group">
                            <label for="start_date">Дата начала</label>
                            <input name="start_date" id="start_date" type="date"
                                      class="form-control admin-theme admin-field admin-table-text" value="{{old('start_date', $item->start_date)}}">
                        </div>

                        <div class="form-group">
                            <label for="end_date">Дата начала</label>
                            <input name="end_date" id="end_date" type="date"
                                      class="form-control admin-theme admin-field admin-table-text" value="{{old('end_date', $item->end_date)}}">
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>







<script type="text/javascript">






    var checkbox = $("#checkbox");

    $(document).ready(function(){

        $.datetimepicker.setLocale('ru');

        $('#datetimepicker').datetimepicker({
            lang:'ru',
            formatDate:'yy-mm-dd',
            format:'d.m.Y H:i',
            step:5,
            language: 'ru'
        });







        checkbox =  !$("#checkbox").prop('checked', true);
        setCheckbox();
    });

    function changeText() {
        setCheckbox();
    }

    function setCheckbox() {
        if(checkbox) {
            $('.admin-theme').addClass('admin-card-field');
            $('.admin-theme').addClass('admin-table-text');
            $('.admin-theme').addClass('admin-field');

        }
        else {
            $('.admin-theme').removeClass('admin-card-field');
            $('.admin-theme').removeClass('admin-table-text');
            $('.admin-theme').removeClass('admin-field');
        }
        checkbox = !checkbox;
    }


</script>

