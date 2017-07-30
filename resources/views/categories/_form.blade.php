{!! csrf_field() !!}

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Tên danh mục</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{ old('name', $category->name) }}">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Banner</label>
    <div class="col-sm-6">
        <label>
            <input type="file" class="post-image form-control"  name="banner"
                   rel="post_status_images" id="banners">
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Danh mục cha</label>
    <div class="col-sm-6">
        <select class="form-control" name="parent_id">
            <option value="0"> Chọn danh mục </option>
            @foreach($parentList as $id => $name)
                <option value="{{ $id }}" {{ $id == $category->parent_id ? ' selected=selected' : '' }}> {{ $name }} </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Kích hoạt</label>
    <div class="col-sm-6">
        <label>
            <input type="checkbox" name="status" value="1" class="ace ace-switch ace-switch-6"{{ old('status', !! $category->status) ? ' checked=checked' : '' }}>
            <span class="lbl"></span>
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Hiển thị sản phẩm ở trang chủ</label>
    <div class="col-sm-6">
        <label>
            <input type="checkbox" name="isRepresentative" value="1" class="ace ace-switch ace-switch-6"{{ old('isRepresentative', !! $category->isRepresentative) ? ' checked=checked' : '' }}>
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
