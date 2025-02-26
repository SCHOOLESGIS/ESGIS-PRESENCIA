
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
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgb(60, 80, 224)');
    gradient.addColorStop(1, 'rgba(60, 80, 224, 0)'); 

    return {
        labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'vendredi', 'Samedi'],
        datasets: [
            {
                type: 'line',
                label: 'Dataset 1',
                borderColor: documentStyle.getPropertyValue('--primary'),
                backgroundColor: gradient,
                borderWidth: 2,
                fill: true,
                tension: 0,
                data: [50, 25, 12, 48, 56, 4]
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
