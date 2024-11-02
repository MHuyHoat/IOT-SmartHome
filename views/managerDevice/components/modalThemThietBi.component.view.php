
                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="modalAddChildAccount"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div
                                    class="modal-dialog "
                                    role="document">
                                    <form class="modal-content" action="managerDevice.php?action=them-moi" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Thêm thiết bị
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-codesandbox">
                                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                        <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                                                        <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                                                        <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                                    </svg>
                                                    Tên thiết bị </label>
                                                <input type="text" class="form-control" name="ten" placeholder="Nhập tên thiết bị " required >
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputEmail" class="form-label">
                                                    <i class="lni lni-arrow-down-circle"></i>
                                                    Loại thiết bị
                                                </label>
                                                <div class="mb-3">

                                                    <select
                                                    required
                                                        class="form-select "
                                                        name="loai_id"
                                                        id="">
                                                        <option value="">Chọn loại thiết bị</option>
                                                        <?php
                                                        for ($j = 0; $j < count($listLoaiThietBi); $j++) {
                                                        ?>

                                                            <option value="<?= $listLoaiThietBi[$j]['id'] ?>">

                                                                <?= $listLoaiThietBi[$j]['ten'] ?> </option>

                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputEmail" class="form-label">
                                                <i class="lni lni-chrome"></i>
                                                    Chân pin ESP32
                                                </label>
                                                <div class="mb-3">

                                                    <select
                                                    required
                                                        class="form-select "
                                                        name="chanpin_id"
                                                        id="">
                                                        <option value="">Chọn chân pin cắm thiết bị</option>
                                                        <?php
                                                        for ($j = 0; $j < count($listChanPin); $j++) {
                                                        ?>

                                                            <option value="<?= $listChanPin[$j]['id'] ?>">

                                                                <?= $listChanPin[$j]['ten'] ?>  </option>

                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputEmail" class="form-label">
                                                    <i class="lni lni-apartment"></i>
                                                    Chọn nơi đặt thiết bị
                                                </label>
                                                <div class="mb-3">

                                                    <select
                                                    required
                                                        class="form-select "
                                                        name="khuvuc_id"
                                                        id="">
                                                        <option value="">Chọn khu vực</option>
                                                        <?php
                                                        for ($j = 0; $j < count($listKhuVuc); $j++) {
                                                        ?>

                                                            <option value="<?= $listKhuVuc[$j]['id'] ?>">

                                                                <?= $listKhuVuc[$j]['ten'] ?> </option>

                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Miêu tả</label>
                                                <input type="text" name="mieu_ta" class="form-control" id="inputPassword" placeholder="Miêu tả thiết bị">
                                            </div>
                                            <div class="col-12 mt-2 d-none">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Nhà </label>
                                                <input type="text" name="nha_id" class="form-control" value="<?= $user['nha_id'] ?>" placeholder="Miêu tả thiết bị">
                                            </div>
                                            <div class="col-12 mt-2 d-none">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Thiết bị Điều khiển </label>
                                                <input type="text" name="parent_id" class="form-control" value="<?= $chipConnect['id'] ?>" placeholder="Miêu tả thiết bị">
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
                                    </form>
                                </div>
                            </div>