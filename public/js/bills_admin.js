$(document).ready(function () {
    // Khi select box thay đổi
    $('#status').change(function () {
        // Lấy giá trị của option được chọn
        var selectedOption = $(this).children("option:selected").val();

        // Xóa tất cả các lớp CSS khác trừ 'status'
        $(this).removeClass().addClass('status');

        // Thêm lớp CSS của option được chọn
        $(this).addClass(selectedOption);
    });
});