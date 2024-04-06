const sidebarCloseButton = document.getElementById("sidebar-dismiss-button");
const sidebar = document.getElementById("accordionSidebar");
const sidebarOpenButton = document.getElementById("sidebarToggleTop");
const pageContent = document.getElementById("content-wrapper");
const body = document.querySelector("body");
const MobileToTabletmediaQuery = window.matchMedia('(max-width: 768px)');
const fromTabletToInfinityMediaQuery = window.matchMedia('(min-width: 768px)');

window.addEventListener("resize", () => {
    if (fromTabletToInfinityMediaQuery.matches) {
        if (sidebar.classList.contains("toggled")) {
            sidebar.classList.remove("toggled")
        }
        document.addEventListener("click", (e) => {
            if (sidebar.classList.contains("toggled") && !sidebarCloseButton.contains(e.target)) {
                sidebar.classList.remove("toggled")
            }
        })
    }
})

const handleSidebarClosingOpeningInSmallerViewPorts = (e) => {
    if (e.matches) {
        sidebarCloseButton.addEventListener("click", () => {
            handleClosingSidebar()
        })

        sidebarOpenButton.addEventListener("click", () => {
            disableContentInteraction(pageContent, body)
            document.getElementById("content-wrapper").classList.add("overlayed")
        })

        document.addEventListener("click", (e) => {
            if (!sidebar.contains(e.target) && !sidebarOpenButton.contains(e.target)) {
                handleClosingSidebar()
            }
        })
    }
}

MobileToTabletmediaQuery.addEventListener('change', () => { handleSidebarClosingOpeningInSmallerViewPorts(MobileToTabletmediaQuery) })

handleSidebarClosingOpeningInSmallerViewPorts(MobileToTabletmediaQuery)

const handleClosingSidebar = () => {
    closeSidebar(sidebar)
    enableContentInteraction(pageContent, body)
    document.getElementById("content-wrapper").classList.remove("overlayed")
}

const closeSidebar = (sidebar) => {
    sidebar.classList.add("toggled");
}

const disableContentInteraction = (pageContent, body) => {
    pageContent.classList.add("disabled")
    body.classList.add("sidebar-open")
}

const enableContentInteraction = (pageContent, body) => {
    pageContent.classList.remove("disabled")
    body.classList.remove("sidebar-open")
}
