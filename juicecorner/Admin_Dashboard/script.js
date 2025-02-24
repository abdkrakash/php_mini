const sidebar = document.querySelector('.sidebar');
const toggleBtn = document.querySelector('.toggle-btn');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

const cardData = [
    { title: "Total Users", value: "1,234" },
    { title: "Total Categories", value: "45" },
    { title: "Total Products", value: "567" }
];

const cardsContainer = document.querySelector('.cards');
cardsContainer.innerHTML = cardData.map(card => `
    <div class="card">
        <h3>${card.title}</h3>
        <p>${card.value}</p>
    </div>
`).join('');

const tableData = [
    { id: 1, name: "John Doe", email: "john@example.com", role: "Admin" },
    { id: 2, name: "Jane Smith", email: "jane@example.com", role: "User" },
    { id: 3, name: "Alice Johnson", email: "alice@example.com", role: "User" }
];

const tableBody = document.querySelector('.table tbody');
tableBody.innerHTML = tableData.map(row => `
    <tr>
        <td>${row.id}</td>
        <td>${row.name}</td>
        <td>${row.email}</td>
        <td>${row.role}</td>
    </tr>
`).join('');

const salesChartCtx = document.getElementById('salesChart').getContext('2d');
const usersChartCtx = document.getElementById('usersChart').getContext('2d');

new Chart(salesChartCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Sales',
            data: [65, 59, 80, 81, 56, 55],
            backgroundColor: '#FF748B',
            borderColor: '#F72C5B',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

new Chart(usersChartCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Users',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: '#A7D477',
            borderColor: '#E4F1AC',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
