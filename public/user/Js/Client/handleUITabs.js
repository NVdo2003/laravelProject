var tabs = document.querySelectorAll('.tab-item')
var panes = document.querySelectorAll('.tab-pane')

tabs.forEach((tab, index) => {
    const pane = panes[index]

    tab.onclick = () => {
        var tabItemActive = document.querySelector('.tab-item.tab--active')
        var paneShow = document.querySelector('.tab-pane.show')
        
        tabItemActive.classList.remove("tab--active")
        paneShow.classList.remove("show")

        tab.classList.add("tab--active")
        pane.classList.add("show")
    }
})