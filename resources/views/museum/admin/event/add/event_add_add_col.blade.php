@php
    /** @var \App\Models\Category $item*/
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body admin-theme admin-field admin-table-text">
                <div class="row">
                    <button id="saveBtn" type="submit" class="btn btn-dark" style="margin-left: 10px">Сохранить</button>
                    <a href="{{route('museum.admin.event.index')}}" class="btn btn-dark" style="margin-left: 20px">События</a>
                </div>
            </div>
        </div>
    </div>
</div><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body admin-theme admin-field admin-table-text">
                    <ul class="list-unstyled">
                        <li>
                            <input  id="checkbox" type="checkbox" style="margin-top: 5px" onchange="changeText()">
                            <label class="deftext">Изменить тему</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<script>


</script>