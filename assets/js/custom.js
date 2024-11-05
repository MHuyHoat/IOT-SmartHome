
const initDataTable = () => {

    new DataTable('#dataTable', {

        language: {
            search: 'Tìm kiếm : ',
            searchPlaceholder: 'Nhập để tìm kiếm ...',
            lengthMenu: 'Hiển thị _MENU_ bản ghi'
        },
        layout: {
            bottom: 'paging',
            bottomStart: 'info',
            bottomEnd: null
        },
        aLengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "Tất cả"]
        ],

    });

}

$(document).ready(function(){
    initDataTable()
    $(".select2").select2();
})
