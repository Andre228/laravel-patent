@php
    /** @var \App\Models\Post $item*/
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body admin-card-field admin-table-text">
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
                            <label for="name">Имя</label>
                            <input name="name" id="name" type="text" value="{{old('name',$item->name)}}"
                                   class="form-control admin-field admin-table-text" minlength="3" required/>
                        </div>

                        <div class="form-group">
                            <label for="link">Ссылка</label>
                            <input name="link" id="link" type="text" value="{{old('link',$item->link)}}"
                                   class="form-control admin-field admin-table-text" minlength="8" required/>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
