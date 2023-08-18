let dataTable;

function getPerPageSelectOptions(rowsCount) {
    let perPageSelectOptions = [];
    for (let i = 10; i <= rowsCount; i += 10) {
        if (i % 10 === 0) {
            perPageSelectOptions.push(i);
        }
    }
    perPageSelectOptions.push(["نمایش همه", -1]);
    return perPageSelectOptions;
}

function getDataTableTemplate(options) {
    return `<div class='${options.classes.top} fixed-table-toolbar'>
    ${options.paging && options.perPageSelect ?
            `<div class='${options.classes.dropdown} bs-bars float-left'>
            <label>
                <select class='${options.classes.selector}'></select>
            </label>
        </div>` :
            ""
        }
    ${options.searchable ?
            `<div class='${options.classes.search} float-right search btn-group'>
            <input class='${options.classes.input} form-control search-input' placeholder='جست و جو' type='search' title='جست و جو'>
        </div>` :
            ""
        }
    </div>
    <div class='${options.classes.container}'${options.scrollY.length ? ` style='height: ${options.scrollY}; overflow-Y: auto;'` : ""}></div>
    <div class='${options.classes.bottom}'>
        ${options.paging ?
            `<div class='${options.classes.info}'></div>` :
            ""
        }
        <nav class='${options.classes.pagination}'></nav>
    </div>`;
}
function smallIDColumns() {
    let IDColumns = document.querySelectorAll("thead th:first-child");
    IDColumns.forEach((col) => {
        col.setAttribute("width", "1");
    });
}

const tables = document.querySelectorAll("table");
tables.forEach((table) => {
    let rowsCount = table.dataset.count
    let perPageSelectOptions = getPerPageSelectOptions(rowsCount);
    dataTable = new simpleDatatables.DataTable(table, {
        perPageSelect: perPageSelectOptions,
        labels: {
            info: "نمایش {start} تا {end} از {rows} مورد",
            noRows: "نتیجه ای برای نمایش یافت نشد",
            noResults: "نتیجه ای مطابق با عبارت جست و جو شده یافت نشد",
        },
        classes: {
            container: "overflow-auto",
            active: "active",
            disabled: "disabled",
            selector: "form-select",
            paginationList: "pagination",
            paginationListItem: "page-item",
            paginationListItemLink: "page-link"
        },
        template: options => getDataTableTemplate(options)
    })

    // adding the footer after the dom is loaded
    document.addEventListener('DOMContentLoaded', () => {
        const template = document.querySelector('.tfoot');

        if (template) {
            const footerElement = template.innerHTML;
            const myDataTable = table;
            myDataTable.innerHTML += footerElement;
        }
    });

    // removing the footer while searching
    const searchBox = table.parentElement.parentElement.querySelector("input");
    searchBox.addEventListener("keyup", () => {
        if (searchBox.value.length > 0) {
            table.querySelector("tfoot").classList.add("d-none")
        }
        else {
            table.querySelector("tfoot").classList.remove("d-none")
        }
    })
});

smallIDColumns();
