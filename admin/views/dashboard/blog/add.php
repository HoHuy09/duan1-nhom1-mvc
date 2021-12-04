<div class="col-md-11">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Tin</h3>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Tiêu đề">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tác giả</label>
                    <select name="id_user" >
                        <?php foreach($listUser as $item): ?>
                            <option value="<?=$item['id_user']?>"><?=$item['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh</label>
                    <input type="file" name="file">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ND ngắn</label>
                    <textarea name="nd_ngan" id="" cols="20" rows="5"></textarea>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ND dài</label>
                    <textarea name="nd_dai" id="" cols="40" rows="10"></textarea>
                    
                </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addCategory">Submit</button>
            </div>
        </form>
    </div>
</div>