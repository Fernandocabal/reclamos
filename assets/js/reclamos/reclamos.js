
function cambiarATab(idTab) {
    const tabTrigger = document.getElementById(idTab);
    const tab = new bootstrap.Tab(tabTrigger);
    tab.show();
}
