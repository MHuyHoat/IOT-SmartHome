  <!-- Step 1 form fields here -->
  <h3> Bước 1: Nhập mã thiết bị ESP-32 ( Chip kết nối ) </h3>
  <div class="mb-3">
    <label for="field1" class="form-label">
      <i class="lni lni-git"></i>
      Mã chip :</label>
    <input type="text" class="form-control" id="maChipKetNoi" name="maChipKetNoi">
  </div>
  <div class="d-flex justify-content-end">
    <div>
      <button type="button" onclick="checkChipKetNoi()" class="btn btn-info ">Kiểm tra</button>
    </div>
    <div class="ms-2">
      <button type="button" id="nextStep2" class="btn btn-primary next-step " disabled>Tiếp </button> 
    </div>
  </div>