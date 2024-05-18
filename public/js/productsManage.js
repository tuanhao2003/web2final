(function () {
    document.addEventListener("DOMContentLoaded", function () {
        // let popup = document.querySelector(".popup");
        // let addProductPopup = document.querySelector(".addProductPopup");
        let statusSetters = document.querySelectorAll(".toggle input");
        let form = document.querySelector(".productForm");

        // btn.addEventListener("mouseup", function () {
        //     if (!popup.classList.contains("show")) {
        //         popup.classList.add("show");
        //     }
        // });

        // document.addEventListener("mousedown", function (event) {
        //     if (!addProductPopup.contains(event.target)) {
        //         popup.classList.remove("show");
        //     }
        // });

        // form.addEventListener("submit", function (e) {
        //     e.preventDefault();
        //     let cloneForm = new FormData(form);
        //     fetch("http://localhost/web2/admin/products", {
        //         method: 'POST',
        //         body: cloneForm
        //     }).catch(error => {
        //         console.error('Error:', error);
        //     });
        // });

        statusSetters.forEach(toggle => {
            let trData = toggle.parentElement.parentElement.parentElement;
            toggle.addEventListener("change", function () {
                form.querySelector("input[name='masp']").value = trData.querySelector(".masp").textContent;
                form.querySelector("input[name='tensp']").value = trData.querySelector(".tensp").textContent;
                form.querySelector("input[name='donGia']").value = trData.querySelector(".dongia").textContent;
                form.querySelector("select[name='maHang']").value = trData.querySelector(".mahang").textContent;
                form.querySelector("input[name='moTa']").value = trData.querySelector(".mota").textContent;
                form.querySelector("input[name='hinhAnh']").value = trData.querySelector(".img-flu").getAttribute("src");
                form.querySelector("input[name='trangThai']").value = toggle.checked == true ? 1 : 0;
                form.querySelector("button[type='submit']").name="update";
                form.querySelector("button[type='submit']").click();
            });
        });

        document.querySelectorAll(".delBtn").forEach(btn => {
            let trData = btn.parentElement.parentElement.parentElement;
            btn.addEventListener("click", function () {
                form.querySelector("input[name='masp']").value = trData.querySelector(".masp").textContent;
                form.querySelector("input[name='tensp']").value = trData.querySelector(".tensp").textContent;
                form.querySelector("input[name='donGia']").value = trData.querySelector(".dongia").textContent;
                form.querySelector("select[name='maHang']").value = trData.querySelector(".mahang").textContent;
                form.querySelector("input[name='moTa']").value = trData.querySelector(".mota").textContent;
                form.querySelector("input[name='hinhAnh']").value = trData.querySelector(".img-flu").getAttribute("src");
                form.querySelector("input[name='trangThai']").value = toggle.checked == true ? 1 : 0;
                form.querySelector("button[type='submit']").name="delete";
                form.querySelector("button[type='submit']").click();
            });
        });

        document.querySelectorAll(".list-group").forEach(group => {
            group.querySelectorAll(".list-group-item").forEach(item => {
                item.addEventListener("click", function () {
                    if (!item.classList.contains("active")) {
                        document.querySelector(".active").classList.remove("active");
                        item.classList.add("active");
                    }
                });
            });
        });
    })
})();