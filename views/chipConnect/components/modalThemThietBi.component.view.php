<div
    class="modal fade"
    id="modalAddThietBi"
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
                    Thêm chip
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