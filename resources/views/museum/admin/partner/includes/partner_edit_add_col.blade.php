@php
    /** @var \App\Models\Category $item*/
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body admin-field admin-table-text">
                <div class="row">
                    <button type="submit" class="btn btn-dark" style="margin-left: 10px">Сохранить</button>
                    <a href="{{ route('contact') }}" class="btn btn-dark" style="margin-left: 20px">Обратно</a>
                </div>
            </div>
        </div>
    </div>
</div><br>
@if(!empty($item))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body admin-field admin-table-text">
                    <ul class="list-unstyled">
                        <li>ID: {{ $item->id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body admin-field admin-table-text">
                    <div class="form-group">
                        <label>Создано</label>
                        <input type="text" value="{{ $item->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Изменено</label>
                        <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
@endif

<script>


</script>