document.addEventListener("DOMContentLoaded", function () {
    let rowsCount = $("#qarisTable").data("count");
    let perPageSelectOptions = getPerPageSelectOptions(rowsCount);
    new simpleDatatables.DataTable("#qarisTable", {
        perPageSelect: perPageSelectOptions,
        labels: {
            info: "نمایش {start} تا {end} از {rows} قاری",
            noRows: "نتیجه ای برای نمایش یافت نشد",
            noResults: "نتیجه ای مطابق با عبارت جست و جو شده یافت نشد",
        },
        classes: {
            table: "table-striped",
            container: "overflow-auto",
            active: "active",
            disabled: "disabled",
            selector: "form-control",
            paginationList: "pagination",
            paginationListItem: "page-item",
            paginationListItemLink: "page-link"
        },
        template: options => getDataTableTemplate(options)
    })
});