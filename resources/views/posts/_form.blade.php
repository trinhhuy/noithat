{!! csrf_field() !!}

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Tiêu đề bài viết</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="name" placeholder="Tiêu đề bài viết" value="{{ old('name', $post->name) }}">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Danh mục bài viết</label>
    <div class="col-sm-6">
        <select class="form-control" name="category_id">
            <option value="0"> Chọn danh mục </option>
            @foreach($categoryList as $id => $name)
                <option value="{{ $id }}" {{ $id == $post->category_id ? ' selected=selected' : '' }}> {{ $name }} </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Mô tả ngắn</label>
    <div class="col-sm-6">
        <label>
             <textarea class="form-control ckeditor" placeholder="Điền nội dung bài viết"
                       name="desc">{{ old('desc', $post->desc) }}</textarea>
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Nội dung bài viết</label>
    <div class="col-sm-6">
        <label>
             <textarea class="form-control ckeditor" placeholder="Điền nội dung bài viết"
                       name="content">{{ old('content', $post->content) }}</textarea>
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Danh sách ảnh</label>
    <div class="col-sm-6">
        <label>
            <input type="file" class="post-image form-control" multiple name="images[]"
                   rel="post_status_images" id="images">
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Kích hoạt</label>
    <div class="col-sm-6">
        <label>
            <input type="checkbox" name="status" value="1" class="ace ace-switch ace-switch-6"{{ old('status', !! $post->status) ? ' checked=checked' : '' }}>
            <span class="lbl"></span>
        </label>
    </div>
</div>

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <button type="submit" class="btn btn-success">
            <i class="ace-icon fa fa-save bigger-110"></i>Lưu
        </button>
    </div>
</div>
