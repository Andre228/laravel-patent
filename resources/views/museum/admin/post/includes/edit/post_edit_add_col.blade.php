@php
    /** @var \App\Models\Category $item*/
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body admin-field admin-table-text">
                <div class="row">
                    <button type="submit" class="btn btn-dark" style="margin-left: 10px">Сохранить</button>
                    <a href="/admin/museum/posts" class="btn btn-dark" style="margin-left: 20px">Статьи</a>
                </div>
            </div>
        </div>
    </div>
</div><br>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body admin-field admin-table-text">
                    <ul class="list-unstyled">
                        <li>ID: {{ $item->id }}</li>
                        <li>
                            <a class="btn btn-dark" data-toggle="collapse" href="#multiCollapseExample1"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="margin-top: 10px">Показать изображения</a>
                        </li>
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
                        <label for="title">Создано</label>
                        <input type="text" value="{{ $item->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Опубликовано</label>
                        <input type="text" value="{{ $item->published_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
@endif