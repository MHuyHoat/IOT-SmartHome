<div
    class="modal fade"
    id="modalAddChildAccount"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <form
        action="?action=them-moi"
        method="POST"
        class="modal-dialog "
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Thêm tài khoản con
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


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
                        <i class="fadeIn animated bx bx-message-rounded-minus"></i>
                        Email </label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
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
                            id="">
                            <option value="">Chọn quyền </option>
                            <?php
                            for ($j = 0; $j < count($listRole ?? []); $j++) {
                            ?>

                                <option value="<?= $listRole[$j]['id'] ?>">

                                    <?= $listRole[$j]['ten'] ?> </option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-12 mt-2 d-none">
                        <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Nhà </label>
                        <input type="text" name="nha_id" class="form-control" value="<?= $user['nha_id'] ?>" placeholder="Miêu tả thiết bị">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div>