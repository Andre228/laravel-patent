
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

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
                            <textarea name="description" id="description" required minlength="10"
                                      class="form-control admin-theme admin-field admin-table-text" rows="20">{{old('description', $item->description)}}</textarea>
                        </div>
                    </div>


                    <div id="errorMessage" hidden class="row justify-content-center notification-block">
                        <div class="col-md-11">
                            <div class="alert alert-danger" role="alert">
                                <div>Дата начала не может быть больше даты конца</div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="start_date">Дата начала</label>
                        <input required onchange="checkDate()" class="form-control admin-theme admin-field admin-table-text" name="start_date" id="start_date"
                               type="text" value="{{old('start_date', $item->start_date)}}">
                    </div>


                    <div class="form-group">
                        <label for="end_date">Дата окончания</label>
                        <input onchange="setEndDate()" type="checkbox" id="notEmptyEndDate">
                        <input disabled onchange="checkDate()" name="end_date" id="end_date" type="text"
                               class="form-control admin-theme admin-field admin-table-text" value="{{old('end_date', $item->end_date)}}">
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>







<script type="text/javascript">


    var notEmptyEndDate = $('#notEmptyEndDate');
    var checkbox = $("#checkbox");


    function checkDate(){
        if(( $('#start_date').val() > $('#end_date').val() ) && notEmptyEndDate ) {
            document.getElementById("errorMessage").removeAttribute("hidden");
            $('#saveBtn').prop('disabled', true);
        }
        else {
            document.getElementById("errorMessage").setAttribute("hidden", "");
            $('#saveBtn').prop('disabled', false);
        }
    }



    $(document).ready(function(){

        $.datetimepicker.setLocale('ru');

        $('#start_date').datetimepicker({
            lang:'ru',
            formatDate:'yy-mm-dd',
            format:'Y-m-d H:i',
            step:5,
            language: 'ru'
        });


        $('#end_date').datetimepicker({
            lang:'ru',
            formatDate:'yy-mm-dd',
            format:'Y-m-d H:i',
            step:5,
            language: 'ru'
        });

        notEmptyEndDate =  $("#notEmptyEndDate").prop('checked', false);
        $('#end_date').prop('disabled', false);
        checkbox =  !$("#checkbox").prop('checked', true);
        setCheckbox();
    });


    function setEndDate() {
        if(notEmptyEndDate) {
            $('#end_date').value = null;
            console.log($('#end_date').value);

            $('#end_date').prop('disabled', true);
            document.getElementById("errorMessage").setAttribute("hidden", "");
            $('#saveBtn').prop('disabled', false);
        }
        else {
            $('.admin-theme').prop('disabled', false);
        }
        notEmptyEndDate = !notEmptyEndDate;
    }

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

