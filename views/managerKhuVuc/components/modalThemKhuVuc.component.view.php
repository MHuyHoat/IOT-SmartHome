
                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="modalThemKhuVuc"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div
                                    class="modal-dialog "
                                    role="document">
                                    <form class="modal-content" action="managerKhuVuc.php?action=them-moi" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Thêm khu vực
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
                                                    Tên khu vực </label>
                                                <input type="text" class="form-control" name="ten" placeholder="Nhập tên khu vực " required >
                                            </div>
                                            <div class="col-12 mt-2">
                                                <input type="text" name="nha_id" class="form-control" id="inputPassword" value="<?= $user['nha_id'] ?>" hidden>
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