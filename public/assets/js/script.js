function getPerPageSelectOptions(rowsCount) {
    let perPageSelectOptions = [];
    for (let i = 10; i <= rowsCount; i += 10) {
        if (i % 10 === 0) {
            perPageSelectOptions.push(i);
        }
    }
    perPageSelectOptions.push(["نمایش همه"]);
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