function deleteKhuVuc(tenViTri, id) {
    swal
      .fire({
        title: "Xác nhận",
        html: `Bạn có chắc muốn xóa vị trí <b>${tenViTri}</b> !`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Có, xóa nó!",
        cancelButtonText: "Không!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          fetch("api/ViTriApi.php", {
            method: "post",
            headers: {
              "Content-type": "application/json",
              Accept: "*",
            },
            body: JSON.stringify({
              id: id,
              action: "deleteViTri",
            }),
          })
            .then((res) => res.json())
            .then((data) => {
              if (data.status == "success") {
                swal.fire({
                  title: "Đã xóa!",
                  text: "Bạn đã xóa thành công.",
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
  