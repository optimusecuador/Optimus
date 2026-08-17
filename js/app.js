lucide.createIcons();

const ctx = document.getElementById("flowChart");

new Chart(ctx, {
  type: "line",
  data: {
    labels: [
      "Dic 2024",
      "",
      "Ene 2025",
      "",
      "Feb 2025",
      "",
      "Mar 2025",
      "",
      "Abr 2025",
      "",
      "May 2025"
    ],
    datasets: [
      {
        label: "Ingresos",
        data: [42000, 43000, 47000, 56000, 61000, 54000, 53500, 56000, 58000, 62000, 68000, 72000, 72000],
        borderColor: "#0faf76",
        backgroundColor: "#0faf76",
        tension: 0.38,
        pointRadius: 4,
        pointHoverRadius: 5,
        borderWidth: 3
      },
      {
        label: "Gastos",
        data: [23000, 22000, 24000, 33000, 39000, 34000, 31000, 33000, 39000, 43000, 41000, 41000, 42000],
        borderColor: "#ff2f65",
        backgroundColor: "#ff2f65",
        tension: 0.38,
        pointRadius: 4,
        pointHoverRadius: 5,
        borderWidth: 3
      },
      {
        label: "Utilidad",
        data: [2500, 3000, 3600, 4200, 5200, 6200, 7600, 9000, 11200, 15800, 17400, 22600, 23500],
        borderColor: "#1558ff",
        backgroundColor: "#1558ff",
        tension: 0.38,
        pointRadius: 4,
        pointHoverRadius: 5,
        borderWidth: 3
      }
    ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: "#061b2d",
        borderColor: "rgba(118, 168, 207, 0.22)",
        borderWidth: 1,
        padding: 12,
        titleColor: "#e8f3ff",
        bodyColor: "#c8d9e9"
      }
    },
    scales: {
      x: {
        grid: { display: false },
        ticks: { color: "#91a9bf", maxRotation: 0, autoSkip: false, font: { size: 11 } },
        border: { display: false }
      },
      y: {
        min: 0,
        max: 85000,
        ticks: {
          color: "#91a9bf",
          stepSize: 20000,
          callback: (value) => (value === 0 ? "0" : `${value / 1000}K`),
          font: { size: 11 }
        },
        grid: { color: "rgba(145, 169, 191, 0.12)" },
        border: { display: false }
      }
    }
  }
});

document.querySelectorAll(".tabs button").forEach((button) => {
  button.addEventListener("click", () => {
    document.querySelector(".tabs .selected")?.classList.remove("selected");
    button.classList.add("selected");
  });
});
