(function () {
    const menuBtn = document.querySelectorAll(".menu-toggler");
    const menu = document.querySelectorAll(".menu-content");
    
    menuBtn.forEach(btn => {
        btn.addEventListener("click", (event) => {
            event.preventDefault();
    
            btn.classList.toggle("active");
    
            menu.forEach(m => {
                m.classList.toggle("active");
            })
        })
    });

    const dropdownBtn = document.querySelectorAll(".dropdown-toggler");

    dropdownBtn.forEach(btn => {
        btn.addEventListener("click", (event) => {
            event.preventDefault();

            dropdownBtn.forEach(b => {
                if (b !== btn) {
                    const parent = b.parentNode;
                    parent.classList.remove("active");
                }
            });

            const parent = btn.parentNode;
            parent.classList.toggle("active");
        })
    });
})();
