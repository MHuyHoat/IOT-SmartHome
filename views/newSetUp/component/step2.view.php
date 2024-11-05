<!-- Step 2 form fields here -->
<h3>Bước 2 : Thiết lập dữ liệu ngôi nhà</h3>
<div class="mb-3">
    <div class="col-12 mt-2 ">
        <label for="inputPassword" class="form-label"> <i class="lni lni-apartment"></i> Tên nhà </label>
        <input type="text" name="ten_nha" class="form-control" placeholder="Nhập tên nhà">
    </div>
    <div class="col-12 mt-2 " id="khuvuc" >
        <div class="col-12 mt-2 ">
            <label for="inputPassword" class="form-label"> <i class="lni lni-page-break"></i> Tên phòng (Khu vực lắp đặt ) </label>
            <input type="text" name="ten_khuvuc[]" class="form-control" placeholder="Tên phòng">
        </div>
    </div>
    <div class="col-12 mt-2">
        <button class="btn btn-secondary btn-sm" onclick="themKhuVuc()">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span>Thêm khu vực</span>
        </button>
    </div>
</div>
<div class="d-flex justify-content-end">
    <div >
        <button type="button" class="btn btn-primary prev-step">Trước</button>
    </div>
    <div class="ms-2">
        <button type="button" class="btn btn-primary next-step">Tiếp</button>
    </div>
</div>