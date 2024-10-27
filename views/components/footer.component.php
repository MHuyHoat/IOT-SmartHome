<!--start footer-->
<footer class="footer">


</footer>
<!--end footer-->


<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top">
    <ion-icon name="arrow-up-outline"></ion-icon>
</a>
<!--End Back To Top Button-->

<!--start switcher-->
<div class="switcher-body">
    <button style="   width: 40px;
        height: 40px;" class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
    </button>
    <button class="btn btn-primary  microphone-md d-flex align-items-center" onclick="startSpeech()" data-bs-toggle="modal"
        data-bs-target="#speechId">
        <!-- Modal trigger button -->


        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
            <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
            <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3" />
        </svg>
    </button>
    <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
                <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
                <label class="form-check-label" for="SemiDark">Semi Dark</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end switcher-->


<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->

</div>
<!--end wrapper-->



        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div
            class="modal fade"
            id="speechId"
            tabindex="-1"
            data-bs-backdrop="static"
            data-bs-keyboard="false"

            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div
                class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Điều khiển qua giọng nói
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div>
                      <div class="gif-icon d-flex justify-content-center" style="width: 100%">
                        <img src="assets/images/gif/hearingMic.gif" alt="">
                      </div>
                       <div class="d-flex justify-content-center" id="speech-text" >Đang lắng nghe...</div>
                       <input type="hidden" name="text" id="speech-text-value" >
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button
                        onclick="stopSpeech()"
                         id="cancelModalSpeech"
                            type="button"
                            class="btn btn-secondary btn-sm"
                            data-bs-dismiss="modal">
                             Hủy 
                        </button>
                        <button
                        onclick="startSpeech()"
                            type="button"
                            class="btn btn-info btn-sm"
                        >
                             Nghe lại 
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="setTrangThaiThietBiBoiGiongNoi('<?=$user['id']?>')" >Thực thi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional: Place to the bottom of scripts -->
        <script>
            const myModal = new bootstrap.Modal(
                document.getElementById("speechId"),
                options,
            );
        </script>
<!-- JS Files-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!--plugins-->
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
<script src="assets/plugins/chartjs/chart.min.js"></script>
<script src="assets/js/index.js"></script>
<!-- Main JS-->
<script src="assets/js/main.js"></script>