<div class="col-md-11">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Thương Hiệu</h3>
        </div>
        <form method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                    <input type="text" name="name" value="<?=$brand['ten_th']?>" class="form-control" placeholder="Enter Thương Hiệu">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addCategory">Submit</button>
            </div>
        </form>
    </div>
</div>