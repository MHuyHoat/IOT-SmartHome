
                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="modalThemChanPin"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div
                                    class="modal-dialog "
                                    role="document">
                                    <form class="modal-content" action="managerPin.php?action=them-moi" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Thêm chân pin
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="col-12 mt-2">
            <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> ID</label>
            <input type="text"  name="id" class="form-control" id="inputPassword" placeholder="ID thiết bị"></input>
          </div>
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
                                                    Tên chân pin </label>
                                                <input type="text" class="form-control" name="ten" placeholder="Nhập tên thiết bị " required >
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Miêu tả</label>
                                                <input type="text" name="mieu_ta" class="form-control" id="inputPassword" placeholder="Miêu tả thiết bị">
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