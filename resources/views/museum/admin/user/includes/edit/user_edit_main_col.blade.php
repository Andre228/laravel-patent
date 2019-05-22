@php
    /** @var \App\Models\Post $item*/
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body admin-card-field admin-table-text">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active admin-table-text" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="name">Логин</label>
                            <input name="name" value="{{$item->name}}" id="name"
                                   type="text"
                                   class="form-control admin-field admin-table-text"
                                   minlength="5"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" value="{{$item->email}}" id="email"
                                   type="email"
                                   class="form-control admin-field admin-table-text" minlength="5" required>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
