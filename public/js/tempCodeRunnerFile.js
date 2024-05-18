// Xác định các biến và hàm cần thiết
// var currentPage = 1; // Trang hiện tại
// var productsPerPage = 6; // Số lượng sản phẩm trên mỗi trang

// // Hàm hiển thị sản phẩm trên trang
// function displayProducts(products) {
//     var startIndex = (currentPage - 1) * productsPerPage;
//     var endIndex = startIndex + productsPerPage;
//     var displayProducts = products.slice(startIndex, endIndex);

//     // Hiển thị sản phẩm
//     var productContainer = document.querySelector(".product-container");
//     productContainer.innerHTML = "";

//     displayProducts.forEach(function(product) {
//         var productCard = document.createElement("div");
//         productCard.classList.add("product-card");

//         var img = document.createElement("img");
//         img.src = "public/data/Sanpham/" + product.hinhAnh;
//         img.alt = product.tensp;

//         var productInfo = document.createElement("div");
//         productInfo.classList.add("product-info");

//         var productName = document.createElement("div");
//         productName.classList.add("product-name");
//         productName.textContent = product.tensp;

//         var productPrice = document.createElement("div");
//         productPrice.classList.add("product-price");
//         productPrice.textContent = product.donGia + " VND";

//         productInfo.appendChild(productName);
//         productInfo.appendChild(productPrice);

//         productCard.appendChild(img);
//         productCard.appendChild(productInfo);

//         productContainer.appendChild(productCard);
//     });
// }

// // Xử lý sự kiện khi nhấn nút "Trang trước đó"
// function prevPage() {
//     if (currentPage > 1) {
//         currentPage--;
//         // Gọi hàm AJAX để lấy danh sách sản phẩm của trang hiện tại
//         fetchProducts();
//     }
// }

// // Xử lý sự kiện khi nhấn nút "Trang tiếp theo"
// function nextPage() {
//     var totalPages = Math.ceil(products.length / productsPerPage);
//     if (currentPage < totalPages) {
//         currentPage++;
//         // Gọi hàm AJAX để lấy danh sách sản phẩm của trang hiện tại
//         fetchProducts();
//     }
// }

// // Hàm AJAX để gọi PHP script để lấy danh sách sản phẩm
// function fetchProducts() {
//     // Thực hiện request AJAX
//     var xhr = new XMLHttpRequest();
//     xhr.open("GET", "get_products.php?page=" + currentPage, true);
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             // Khi nhận được dữ liệu từ máy chủ, hiển thị sản phẩm
//             var response = JSON.parse(xhr.responseText);
//             displayProducts(response.products);
//         }
//     };
//     xhr.send();
// }

// // Hiển thị trang đầu tiên khi trang được tải
// fetchProducts();
