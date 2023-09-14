console.log("hi")
// live search

const searchInput = document.getElementById("search-input");
const cardsWrapper = document.getElementById("qari-cards-wrapper")
const cards = document.querySelectorAll(".qari-card");
let names = document.querySelectorAll(".qari-card .card-title")


let data = []
names.forEach((e) => {
    data.push(e)
});
let searchPrompt;

console.log(data)

const search = (prompt) => {
    cards.forEach((e) => {
        e.classList.add("d-none");
    })
    data
        .filter((item) => {
            return (
                item.textContent.toLowerCase().includes(prompt)
            )
        })
        .forEach((e) => {
            e.closest(".qari-card").classList.remove("d-none")
        })

}

searchInput.addEventListener('input', (e) => {
    searchPrompt = e.target.value.toLowerCase()
    search(searchPrompt)
})
