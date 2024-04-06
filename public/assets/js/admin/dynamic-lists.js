/*
docs:
every container should have a class of "dl-container"

every add text input should have a class of "dl-input"

every add button should have a class of "dl-add-btn"

every list item template should have a class of "${list.id}-item-template"

the form that contains the dynamic lists should have a class of "main-form"

every slot for text in the template should have a class of "list-item-text"

every slot for image in the template should have a class of "list-item-image" and it should be an img tag

every slot should have data-value-target of the query selector for the input field that
it gets its value from

if the data has hidden inputs for sending data to the database:
- every hidden input for data injection should have a class of "hidden-value-input"
- every hidden input field should be added inside the DlContainer preferability above the ul


*/


const dynamicListContainers = document.querySelectorAll(".dl-container")
const mainForm = document.querySelector(".main-form")

document.addEventListener("DOMContentLoaded", () => {
    dynamicListContainers.forEach(DlContainer => {
        initDl(DlContainer)
        handleStoringListData(DlContainer)
        handleInjectingDataFromHiddenInput(DlContainer)

    })
})

function initDl(DlContainer) {
    const list = DlContainer.querySelector("ul");
    const addButton = DlContainer.querySelector(".dl-add-btn");
    const DlInputs = DlContainer.querySelectorAll(".dl-input");
    handleEmptyState(list)

    addButton.addEventListener("click", () => {
        if (checkIfInputsAreValid(DlInputs)) {
            let liClone = getLiTemplate(list.id).content.cloneNode(true);
            fillSlots(DlContainer, liClone)

            let deleteBtn = liClone.querySelector(".dl-delete-btn")
            deleteBtn.addEventListener("li-remove", () => {
                handleEmptyState(list)
            })

            list.append(liClone);
            handleEmptyState(list)


            // if the dynamic list is an accordion, show accordion when a list item is added
            if (DlContainer.classList.contains("accordion")) {
                const bsColapse = new bootstrap.Collapse(DlContainer.querySelector(".collapse"), { toggle: false })
                bsColapse.show()
            }


        }

    })

    // click the add button if the user presses enter
    DlInputs.forEach(input => {
        input.addEventListener("keypress", (e) => {
            if (checkIfInputsAreValid) {
                if (e.code === "Enter") {
                    e.preventDefault()
                    addButton.dispatchEvent(new Event("click"))
                }
            }
        })
    })
}

function fillSlots(DlContainer, liClone) {
    let TextSlots = liClone.querySelectorAll(".list-item-text");
    // fill text slots
    TextSlots.forEach(slot => {
        slot.textContent = document.querySelector(slot.dataset.valueTarget).value;
        document.querySelector(slot.dataset.valueTarget).value = ''
    })

    // fill image slot
    if (DlContainer.dataset.withImage === "true") {
        let imageSlots = liClone.querySelectorAll(".list-item-image");
        imageSlots.forEach((imageSlot) => {
            postImageFile(imageSlot).then(
                src => {
                    PreviewImage(imageSlot)
                    getListHiddenInput(DlContainer).value = `${getListHiddenInput(DlContainer).value}${src},`
                    imageSlot.dataset.src = src
                    // window.alert(getListHiddenInput(DlContainer).value)
                }
            )
        })
    }
}

function handleInjectingDataFromHiddenInput(DlContainer) {
    if (getListHiddenInput(DlContainer).value !== "") {
        if (DlContainer.dataset.valueType === "single-value") {
            injectDataIntoSingleValueListItemsFromHiddenInput(DlContainer)
        }
        if (DlContainer.dataset.valueType === "key-value-pair") {
            injectDataIntoKeyValuePairItemsFromHiddenInput(DlContainer)
        }
        if (DlContainer.dataset.valueType === "image") {
            injectDataIntoImageListItemsFromHiddenInput(DlContainer)
        }
    }
}

function handleStoringListData(DlContainer) {
    mainForm.addEventListener("submit", (e) => {
        e.preventDefault();
        if (checkIfListIsEmpty(DlContainer)) {
            if (DlContainer.dataset.valueType === "single-value") {
                storeSingleValueListData(DlContainer)
            }
            if (DlContainer.dataset.valueType === "key-value-pair") {
                storeKeyValuePairListData(DlContainer)
            }
        }

        if (mainForm.checkValidity()) {
            mainForm.submit();
        }
    })

}

function storeSingleValueListData(DlContainer) {
    const listItemValues = []
    getListItemTextElements(DlContainer).forEach(li => {
        listItemValues.push(li.textContent.trim())
    })
    getListHiddenInput(DlContainer).value = listItemValues.toString()
}

function storeKeyValuePairListData(DlContainer) {
    // get the data from text slots in the list items as key value pair object
    // and store it in the hidden input field on form submit
    const listItemValues = []
    getListItemElements(DlContainer).forEach(li => {
        const key = li.querySelector(".list-item-key").textContent;
        const value = li.querySelector(".list-item-value").textContent;
        listItemValues.push({ key, value });
    })
    getListHiddenInput(DlContainer).value = JSON.stringify(listItemValues)
}

function injectDataIntoSingleValueListItemsFromHiddenInput(DlContainer) {
    const list = DlContainer.querySelector("ul")
    list.querySelector("li.empty-state-text").remove()
    getListHiddenInput(DlContainer).value.split(",")
        .forEach(value => {
            let liClone = getLiTemplate(list.id).content.cloneNode(true);
            let TextSlots = liClone.querySelectorAll(".list-item-text");
            TextSlots.forEach(slot => {
                slot.textContent = value;
            })
            list.append(liClone);
        })
}

function injectDataIntoKeyValuePairItemsFromHiddenInput(DlContainer) {
    const list = DlContainer.querySelector("ul")
    list.querySelector("li.empty-state-text").remove()
    const listItemValues = JSON.parse(getListHiddenInput(DlContainer).value)
    listItemValues.forEach(value => {
        let liClone = getLiTemplate(list.id).content.cloneNode(true);
        const keyEl = liClone.querySelector(".list-item-key");
        const valueEl = liClone.querySelector(".list-item-value");
        keyEl.textContent = value.key;
        valueEl.textContent = value.value;
        list.append(liClone);
    })
}

function injectDataIntoImageListItemsFromHiddenInput(DlContainer) {
    const list = DlContainer.querySelector("ul")
    list.querySelector("li.empty-state-text").remove()
    getListHiddenInput(DlContainer).value = removeLastComma(getListHiddenInput(DlContainer).value)
    getListHiddenInput(DlContainer).value.split(",")
        .forEach(value => {
            let liClone = getLiTemplate(list.id).content.cloneNode(true);
            let imageSlot = liClone.querySelector(".list-item-image");
            imageSlot.src = value;
            list.append(liClone);
        })
}

function handleEmptyState(list) {
    const emptyLi = document.createElement("li");
    emptyLi.textContent = "هنوز هیچ گزینه ای ثبت نشده";
    emptyLi.classList.add("list-unstyled")
    emptyLi.classList.add("text-center");
    emptyLi.classList.add("empty-state-text");
    emptyLi.classList.add("text-gray-600");

    if (!list.children.length) {
        list.append(emptyLi);
    } else if (list.children.length > 1 && list.querySelector("li.empty-state-text")) {
        try {
            list.querySelector("li.empty-state-text").remove()
        } catch {
            console.log("the else if argument was true because of another reason")
        }
    }
}

// utility functions
function checkIfInputsAreValid(inputs) {
    let counter = 0
    inputs.forEach(input => {
        if (input.value !== "") {
            counter++
        }
    })
    if (counter === inputs.length) {
        return true
    } else {
        return false
    }
}

function getLiTemplate(listId) {
    try {
        return document.getElementById(`${listId}-item-template`)
    } catch (error) {
        console.log(error);
    }
}

function PreviewImage(imageSlot) {
    let FileReaderObj = new FileReader();
    FileReaderObj.readAsDataURL(document.querySelector(imageSlot.dataset.valueTarget).files[0]);
    FileReaderObj.onload = function (oFREvent) {
        imageSlot.src = oFREvent.target.result;
    };
}

async function postImageFile(imageSlot) {
    const file = document.querySelector(imageSlot.dataset.valueTarget).files[0]
    let formData = new FormData();
    formData.append("image", file);
    const response = await fetch(`${apiBaseUrl}/admin/upload`, {
        method: "POST",
        body: formData,
    })
    const data = await response.json()
    return data.src
}

// function postImageSrc(deleteBtn) {
//     console.log(deleteBtn.closest("li").querySelector(".list-item-image").src)
// }

// this function is called via the on click attribute
function removeListItem(deleteBtn) {
    deleteBtn.closest("li").remove()
    deleteBtn.dispatchEvent(new Event("li-remove"))
}

function removeImageListItem(deleteBtn) {
    const hiddenInput = getListHiddenInput(deleteBtn.closest(".dl-container"))
    const listItem = deleteBtn.closest("li");
    const imageSrc = listItem.querySelector(".list-item-image").dataset.src
    hiddenInput.value = hiddenInput.value.replace(`${imageSrc},`, "")
    // window.alert(hiddenInput.value);
    listItem.remove()
    deleteBtn.dispatchEvent(new Event("li-remove"))

}

const getListItemTextElements = DlContainer => DlContainer.querySelectorAll(".list-item-text")

const getListItemElements = DlContainer => DlContainer.querySelectorAll("ul li")

const getListHiddenInput = DlContainer => DlContainer.querySelector(".hidden-value-input")

function checkIfListIsEmpty(DlContainer) {
    if (DlContainer.querySelector("ul li:not(.empty-state-text)")) {
        return true
    }
    return false
}

// function uploadImageFile(DlContainer, imageSlot) {
//     const fileInput = document.querySelector(imageSlot.dataset.valueTarget).files[0]
//     console.log(fileInput.files[0]);
//     let formData = new FormData();
//     formData.append("file", fileInput.files[0]);

//     getListHiddenInput(DlContainer).value = JSON.stringify(formData)
// }

// function removeFile(DlContainer) {
//     getListHiddenInput(DlContainer).value = ""
// }
