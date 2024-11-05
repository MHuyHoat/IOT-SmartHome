<!-- Step 3 form fields here -->
<h3> Bước 3: Tạo tài khoản quản trị ngôi nhà </h3>
<div class="mb-3">
    <div class="col-12 mt-2">
        <label for="inputEmail" class="form-label">
            <i class="fadeIn animated bx bx-user-circle"></i>
            Họ tên</label>
        <input type="text" class="form-control" name="hoten" placeholder="Họ tên người dùng " required>
    </div>
    <div class="col-12 mt-2">
        <label for="inputEmail" class="form-label">
            <i class="lni lni-angular"></i>
            Tên đăng nhập </label>
        <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required>
    </div>
    <div class="col-12 mt-2">
        <label for="inputPassword" class="form-label">
            <i class="lni lni-cog"></i>
            Mật khẩu </label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mật khẩu " required>
    </div>
    <div class="col-12 mt-2">
                    <label for="inputEmail" class="form-label">
                        <i class="lni lni-apartment"></i>
                        Loại tài khoản
                    </label>
                    <div class="mb-3">

                        <select
                            required
                            class="form-select "
                            name="role_id"
                            readonly
                            id="">
                            <option value="2">admin </option>
                           

                        </select>
                    </div>

</div>
<div class="d-flex justify-content-end">
    <div>
        <button type="button" class="btn btn-primary prev-step">Trước</button>
    </div>
    <div class="ms-2">
        <button type="submit" class="btn btn-success">Hoàn thành</button>
    </div>
</div>