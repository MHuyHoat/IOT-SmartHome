function changePermission(user_id,thietbi_id,permissionType){
    if(permissionType=='view'){

        $(`#permissionc${thietbi_id}`).prop('checked', function(i, value) {
            return !value; // Trả về giá trị ngược lại
        });
    }else{
        $(`#permissionv${thietbi_id}`).prop('checked', function(i, value) {
            return !value; // Trả về giá trị ngược lại
        });
       
    }
    fetch("api/PermissionApi.php", {
        method: "post",
        headers: {
          "Content-type": "application/json",
          Accept: "*",
        },
        body: JSON.stringify({
          thietbi_id: thietbi_id,
          user_id: user_id,
          action: "changePermissionType",
          permission_type: permissionType
        }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status == "success") {
            toastr.success("Bạn đã thay đổi quyền thành công ")
          } else {
            toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau");

            window.location.reload();
          }
        })
        .catch((err) => console.log(err));

}