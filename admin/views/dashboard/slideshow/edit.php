<div class="col-md-11">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Slide Show</h3>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Slide Show</label>
                    <input type="text" name="name" value="<?=$field['ten_slide']?>" class="form-control" placeholder="Enter danh mục">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh Slide</label>
                    <input type="file" name="file" class="form-control" >
                    <img src="<?= PUBLIC_PATH . $field['anh_slide'] ?>" width="100">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Đường Link</label>
                    <input type="text" name="duonglink" value="<?=$field['link_slide']?>" class="form-control" placeholder="Enter đường link" >
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addCategory">Submit</button>
            </div>
        </form>
    </div>
</div>