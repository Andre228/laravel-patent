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
                            <label for="bigtitle">Главный заголовок</label>
                            <input name="bigtitle" id="bigtitle" type="text" value="{{old('bigtitle',$abouts->bigtitle)}}"
                                   class="form-control admin-field admin-table-text" minlength="3" required/>
                        </div>

                        <div class="form-group">
                            <label for="title1">Второй заголовок</label>
                            <input name="title1" id="title1" type="text" value="{{old('title1',$abouts->title1)}}"
                                   class="form-control admin-field admin-table-text" minlength="3" required/>
                        </div>

                        <div class="form-group">
                            <label for="title2">Третий заголовок</label>
                            <input name="title2" id="title2" type="text" value="{{old('title2',$abouts->title2)}}"
                                   class="form-control admin-field admin-table-text" minlength="3" required/>
                        </div>

                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">

                        <div class="form-group">
                            <label for="description1">Первое описание</label>
                            <textarea name="description1" id="description1"type="text" rows="5" minlength="10" required
                                      class="form-control admin-field admin-table-text">{{old('description1',$abouts->description1)}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description2">Второе описание</label>
                            <textarea name="description2" id="description2" type="text" rows="5" minlength="10" required
                                   class="form-control admin-field admin-table-text">{{old('description2',$abouts->description2)}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description3">Третье описание</label>
                            <textarea name="description3" id="description3" type="text" rows="5" minlength="10" required
                                   class="form-control admin-field admin-table-text">{{old('description3',$abouts->description3)}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="feature1">Первый плюс</label>
                            <input name="feature1" id="feature1" value="{{old('feature1',$abouts->feature1)}}" type="text" minlength="5" required
                                   class="form-control admin-field admin-table-text">
                        </div>

                        <div class="form-group">
                            <label for="feature2">Второй плюс</label>
                            <input name="feature2" id="feature2" value="{{old('description3',$abouts->feature2)}}" type="text" minlength="5" required
                                   class="form-control admin-field admin-table-text">
                        </div>

                        <div class="form-group">
                            <label for="feature3">Третий плюс</label>
                            <input name="feature3" id="feature3" value="{{old('description3',$abouts->feature3)}}" type="text" minlength="5" required
                                   class="form-control admin-field admin-table-text">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
