function deleteTaiKhoan(tenTaiKhoan, id) {
    swal
      .fire({
        title: "Xác nhận",
        html: `Bạn có chắc muốn xóa tài khoản <b>${tenTaiKhoan}</b> !`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Có, xóa nó!",
        cancelButtonText: "Không!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          fetch("api/UserApi.php", {
            method: "post",
            headers: {
              "Content-type": "application/json",
              Accept: "*",
            },
            body: JSON.stringify({
              id: id,
              action: "deleteUser",
            }),
          })
            .then((res) => res.json())
            .then((data) => {
              if (data.status == "success") {
                swal.fire({
                  title: "Đã xóa!",
                  text: "Bạn đã xóa tài khoản người dùng thành công.",
                  icon: "success",
                });
                setTimeout(() => {
                  window.location.reload();
                }, 2000);
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