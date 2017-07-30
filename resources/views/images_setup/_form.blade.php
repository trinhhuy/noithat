{!! csrf_field() !!}

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Tiêu đề ảnh</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="title" placeholder="Tiêu đề ảnh" value="{{ old('name', $image->title) }}">
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Ảnh</label>
    <div class="col-sm-6">
        <label>
            <input type="file" class="post-image form-control"  name="image"
                   rel="post_status_images" id="images">
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Loại ảnh</label>
    <div class="col-sm-6">
        <label>
           <select class="form-control" name="type">
               <option value="">-- Chọn loại ảnh --</option>
               <option value="1" {{ $image->type == 1 ? 'selected' : '' }}>-- Ảnh footer --</option>
               <option value="2" {{ $image->type == 2 ? 'selected' : '' }}>-- Ảnh banner --</option>
           </select>
        </label>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">Kích hoạt</label>
    <div class="col-sm-6">
        <label>
            <input type="checkbox" name="status" value="1" class="ace ace-switch ace-switch-6"{{ old('status', !! $image->status) ? ' checked=checked' : '' }}>
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
