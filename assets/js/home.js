function startSpeech() {
  // lấy tham chiếu output div
  var output = document.getElementById("speech-text");
  // Đối tượng nhận dạng giọng nói mới
  var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
  // cài đặt ngôn ngữ
  recognition.lang = "vi-VN";
  // Điều này sẽ chạy khi nhận dạng giọng nói bắt đầu
  recognition.onstart = function () {
    output.innerHTML = "Đang lắng nghe...";
  };

  // Điều này sẽ chạy khi nhận dạng giọng nói trả về kết quả
  recognition.onresult = function (event) {
    var transcript = event.results[0][0].transcript;

    output.innerHTML = transcript;
    document
      .getElementById("speech-text-value")
      .setAttribute("value", transcript);
  };
  recognition.start();
}

function stopSpeech() {
  document.getElementById("speech-text-value").setAttribute("value", "");
}
function setTrangThaiThietBiBoiGiongNoi(userId) {
  var text = document.getElementById("speech-text-value").value;
  fetch("api/ThietBiApi.php", {
    method: "post",
    headers: {
      "Content-type": "application/json",
      Accept: "*",
    },
    body: JSON.stringify({
      userId: userId,
      text: text,
      action: "controlTrangThaiBySpeech",
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status == "success") {
        toastr.success("Bạn đã đổi trạng thái thiết bị thành công ");
        console.log(data);
        document.querySelector(`#statusTrangThai${data.data.id}`).checked =
          data.data.trangthai == 1 ? true : false;
        document.querySelector("#cancelModalSpeech").click();
      } else {
        toastr.error(data.message);
      }
    })
    .catch((err) => console.log(err));
}
function setTrangThaiThietBi(id) {
  fetch("api/ThietBiApi.php", {
    method: "post",
    headers: {
      "Content-type": "application/json",
      Accept: "*",
    },
    body: JSON.stringify({
      id: id,
      action: "controlTrangThaiByButton",
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status == "success") {
        toastr.success("Bạn đã đổi trạng thái thiết bị thành công ");
      } else {
        toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau");

        window.location.reload();
      }
    })
    .catch((err) => console.log(err));
}
function deleteThietBi(tenThietBi, id) {
  swal
    .fire({
      title: "Xác nhận",
      html: `Bạn có chắc muốn xóa thiết bị <b>${tenThietBi}</b> !`,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Có, xóa nó!",
      cancelButtonText: "Không!",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        fetch("api/ThietBiApi.php", {
          method: "post",
          headers: {
            "Content-type": "application/json",
            Accept: "*",
          },
          body: JSON.stringify({
            id: id,
            action: "deleteThietBi",
          }),
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.status == "success") {
              swal.fire({
                title: "Đã xóa!",
                text: "Bạn đã xóa thiết bị thành công.",
                icon: "success",
              });
              setTimeout(() => {
                window.location.reload();
              }, 1000);
            } else {
              toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau");

              window.location.reload();
            }
          })
          .catch((err) => console.log(err));
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
      }
    });
}
