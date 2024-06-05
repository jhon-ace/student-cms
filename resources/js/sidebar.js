// document.addEventListener('DOMContentLoaded', function () {
//     const sidebar = document.getElementById('sidebar');
//     const toggleButton = document.getElementById('sidebar-toggle');

//     toggleButton.addEventListener('click', function () {
//         if (sidebar.classList.contains('collapsed')) {
//             sidebar.classList.remove('collapsed');
//             sidebar.classList.add('expanded');
//             toggleButton.classList.add('expanded');
//         } else {
//             sidebar.classList.add('collapsed');
//             sidebar.classList.remove('expanded');
//             toggleButton.classList.remove('expanded');
//         }
//     });

//     // Ensure sidebar state is appropriate on page load
//     function adjustSidebar() {
//         if (window.innerWidth < 768) {
//             sidebar.classList.add('collapsed');
//             sidebar.classList.remove('expanded');
//             toggleButton.classList.remove('expanded');
//         } else {
//             sidebar.classList.remove('collapsed');
//             sidebar.classList.add('expanded');
//             toggleButton.classList.add('expanded');
//         }
//     }

//     // Adjust sidebar on page load and on window resize
//     window.addEventListener('load', adjustSidebar);
//     window.addEventListener('resize', adjustSidebar);
// });

// resources/js/sidebar.js
window.toggleDropdown = function(event) {
    event.stopPropagation();
    let dropdown = event.currentTarget.nextElementSibling;
    dropdown.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    let dropdowns = document.querySelectorAll('.dropdown-menu');
    dropdowns.forEach(function(dropdown) {
        if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
        }
    });
});

var ctx = document.getElementById('enrolleesChart').getContext('2d');
    var enrolleesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2021-2022', '2022-2023', '2023-2024', '2024-2025'],
            datasets: [{
                label: 'Numbers of Enrolees',
                data: [1200, 1489, 2000, 0],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.5
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'School Year',
                        font: {
                            size: 16
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Enrollees',
                        font: {
                            size: 16
                        }
                    }
                }
            }
        }
    });