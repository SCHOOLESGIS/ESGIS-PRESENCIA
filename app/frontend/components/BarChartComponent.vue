
<template>
    <div class="w-full h-full">
        <Chart type="bar" :data="chartData" :options="chartOptions" class="h-[100%]" />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();
        
const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'vendredi', 'Samedi'],
        datasets: [
            {
                type: 'line',
                label: 'Dataset 1',
                borderColor: documentStyle.getPropertyValue('--primary'),
                borderWidth: 2,
                fill: false,
                tension: 0.4,
                data: [50, 25, 12, 48, 56, 4]
            },
            {
                type: 'bar',
                label: 'Dataset 3',
                backgroundColor: documentStyle.getPropertyValue('--stroke'),
                data: [60, 60, 60, 60, 60, 60]
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--p-text-muted-color');
    const surfaceBorder = documentStyle.getPropertyValue('--p-content-border-color');

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.6,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder
                }
            }
        }
    };
}
</script>
