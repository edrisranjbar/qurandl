

const months = ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"];
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: months,
        datasets: [
            {
                label: 'تعداد بازدیدکنندگان',
                data: [12, 19, 3, 5, 2, 3, 2, 10, 13, 54, 12, 54],
                borderWidth: 1
                
            },
            {
                label: 'تعداد بازدیدها',
                data: [20, 18, 5, 1, 43, 55, 34, 11, 16, 45, 32, 12],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

