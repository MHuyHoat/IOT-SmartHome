
                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="modalAddThietBi"
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
                                                    <i class="lni lni-apartment"></i>
                                                    Khu vực đặt thiết bị
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
                                                <label for="inputEmail" class="form-label">
                                                    <i class="lni lni-apartment"></i>
                                                   Vị trí
                                                </label>
                                                <div class="mb-3">

                                                    <select
                                                    required
                                                        class="form-select "
                                                        name="vitri_id"
                                                        id="">
                                                        <option value="">Chọn vị trí</option>
                                                        <?php
                                                        for ($j = 0; $j < count($listViTri); $j++) {
                                                        ?>

                                                            <option value="<?= $listViTri[$j]['id'] ?>">

                                                                <?= $listViTri[$j]['ten'] ?> </option>

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