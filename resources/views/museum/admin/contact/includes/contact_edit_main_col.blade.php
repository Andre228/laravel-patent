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
                    <li class="nav-item">
                        <a class="nav-link admin-table-text" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" value="{{old('email',$item->email)}}"
                                   class="form-control admin-field admin-table-text" minlength="3" required/>
                        </div>

                        <div class="form-group">
                            <label for="phone1">Телефон 1</label>
                            <input name="phone1" id="phone1" type="text" value="{{old('phone1',$item->phone1)}}"
                                   class="form-control admin-field admin-table-text" minlength="8" required/>
                        </div>

                        <div class="form-group">
                            <label for="phone2">Телефон 2</label>
                            <input name="phone2" id="phone2" type="text" value="{{old('phone2',$item->phone2)}}"
                                   class="form-control admin-field admin-table-text" minlength="8" required/>
                        </div>

                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" id="title" type="text" value="{{old('title',$item->title)}}"
                                   class="form-control admin-field admin-table-text" minlength="10" required/>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Подзаголовок</label>
                            <input name="subtitle" id="subtitle" type="text" value="{{old('subtitle',$item->subtitle)}}"
                                   class="form-control admin-field admin-table-text" minlength="15" required/>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">

                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input name="instagram" id="instagram" value="{{old('instagram',$item->instagram)}}" type="text"
                                   class="form-control admin-field admin-table-text">
                        </div>

                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input name="twitter" id="twitter" value="{{old('twitter',$item->twitter)}}" type="text"
                                   class="form-control admin-field admin-table-text">
                        </div>

                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input name="facebook" id="facebook" value="{{old('facebook',$item->facebook)}}" type="text"
                                   class="form-control admin-field admin-table-text">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
