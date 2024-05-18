document.addEventListener("DOMContentLoaded", function () {
    function slide(itemList, activeIndex) {
        let prev, next = 0;

        if (activeIndex - 1 < 0) {
            prev = itemList.length - 1;
        } else {
            prev = activeIndex - 1;
        }
        if (activeIndex + 1 > itemList.length - 1) {
            next = 0;
        } else {
            next = activeIndex + 1;
        }

        itemList[prev].classList.remove("active");
        itemList[activeIndex].classList.add("active");

        if(prev == 0){
            itemList[itemList.length-1].classList.remove("prev");
        }else{
            itemList[prev-1].classList.remove("prev");
        }
        itemList[prev].classList.add("prev");

        if(next == 0){
            itemList[itemList.length-1].classList.remove("next");
        }else{
            itemList[next-1].classList.remove("next");
        }
        itemList[next].classList.add("next"); 

        activeIndex = next;
        return activeIndex;
    }

    document.querySelectorAll(".slide").forEach(sld => {
        let itemList = Array.from(sld.querySelectorAll(".slide-item"));
        let index = itemList.indexOf(sld.querySelector(".slide-item.active"));
        
        setInterval(function(){
            index = slide(itemList, index);
        }, 5000)
    });

    window.addEventListener("scroll", function () {
        let navbarPos = document.querySelector(".navBar").getBoundingClientRect();
        let navBottom = navbarPos.bottom;
        if (navBottom < 0) {
            if (!document.querySelector(".navBar").classList.contains("sticky")) {
                document.querySelector(".navBar").classList.add("sticky");
                setTimeout(function(){
                    document.querySelector(".hideBox").classList.add("hide")
                },300);
            }
        } if (window.scrollY == 0) {
            document.querySelector(".hideBox").classList.remove("hide");
            setTimeout(function(){
                document.querySelector(".navBar").classList.remove("sticky")
            },300);
        }
    })

    document.querySelector(".searchIcon").addEventListener("click", function(){
        document.querySelector(".hideBox").classList.remove("hide");
    });
});