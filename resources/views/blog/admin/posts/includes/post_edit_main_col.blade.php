@php
    /** @var \App\Models\BlogPost $item*/
@endphp
<div class="row justify-content-center">
    <div class="col md 12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" data-toggle="tab" role="tab" class="nav-link">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="maindata">
                        <div class="form-group">
                            <label for="title">Загаловок</label>
                            <input name="title" value="{{ $item->title }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      rows="20"
                                      class="form-control">{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="adddata">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    type="text"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      rows="3"
                                      class="form-control">{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden"
                                   value="0"
                                   name="is_published">

                            <input type="checkbox"
                                   value="1"
                                   name="is_published"
                                   class="form-check-input"
                                   @if($item->is_published)
                                   checked="checked"
                                    @endif
                            >
                            <label for="is_published" class="form-check-label">Опубликованно</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>