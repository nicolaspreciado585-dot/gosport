import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", () => {
    const animationConfig = {
        duration: 1800, // ms
        easing: 'easeOutBounce', // efecto rebote
        delay: (context) => context.dataIndex * 150 // escalonado
    };

    // Reservas
    const ctx1 = document.getElementById("reservasChart");
    if (ctx1) {
        new Chart(ctx1, {
            type: "bar",
            data: {
                labels: ["Fútbol", "Tenis", "Básquet"],
                datasets: [{
                    label: "Reservas",
                    data: [45, 25, 15],
                    backgroundColor: ["#111827", "#6B7280", "#9CA3AF"]
                }]
            },
            options: {
                responsive: true,
                animation: animationConfig
            }
        });
    }

    // Pagos
    const ctx2 = document.getElementById("pagosChart");
    if (ctx2) {
        new Chart(ctx2, {
            type: "doughnut",
            data: {
                labels: ["Tarjeta", "Efectivo", "Transferencia"],
                datasets: [{
                    label: "Pagos",
                    data: [2000000, 1000000, 500000],
                    backgroundColor: ["#111827", "#6B7280", "#9CA3AF"]
                }]
            },
            options: {
                responsive: true,
                animation: animationConfig
            }
        });
    }

    // Usuarios
    const ctx3 = document.getElementById("usuariosChart");
    if (ctx3) {
        new Chart(ctx3, {
            type: "pie",
            data: {
                labels: ["18-25", "26-35", "36-50", "50+"],
                datasets: [{
                    label: "Usuarios",
                    data: [50, 40, 20, 10],
                    backgroundColor: ["#111827", "#4B5563", "#9CA3AF", "#D1D5DB"]
                }]
            },
            options: {
                responsive: true,
                animation: animationConfig
            }
        });
    }

    // Eventos
    const ctx4 = document.getElementById("eventosChart");
    if (ctx4) {
        new Chart(ctx4, {
            type: "line",
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"],
                datasets: [{
                    label: "Eventos",
                    data: [2, 3, 1, 4, 2, 5],
                    borderColor: "#111827",
                    backgroundColor: "rgba(17,24,39,0.2)",
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                animation: animationConfig
            }
        });
    }
});


