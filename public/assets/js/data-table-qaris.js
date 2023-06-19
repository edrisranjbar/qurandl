document.addEventListener("DOMContentLoaded", function () {
    let rowsCount = $("#qarisTable").data("count");
    let perPageSelectOptions = getPerPageSelectOptions(rowsCount);
    new simpleDatatables.DataTable("#qarisTable", {
        perPageSelect: [perPageSelectOptions],
        labels: {
            info: "نمایش {start} تا {end} از {rows} رکورد",
            noRows: "نتیجه ای برای نمایش یافت نشد",
            noResults: "نتیجه ای مطابق با عبارت جست و جو شده یافت نشد",
        },
        classes: {
            active: "active",
            disabled: "disabled",
            selector: "form-select",
            paginationList: "pagination",
            paginationListItem: "page-item",
            paginationListItemLink: "page-link"
        },
        template: options => getDataTableTemplate(options)
    })
});