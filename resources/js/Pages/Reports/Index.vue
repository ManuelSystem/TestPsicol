<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Bar, Pie } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, 
    LinearScale, ArcElement } from 'chart.js';
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale
,ArcElement);

const props = defineProps({
    data:{type:Object},
    data2:{type:Object},
});

const students = ref([]);
const teachers = ref([]);
const subjectsStudents = ref([]); 
const subjectsTeachers = ref([]);
const chartDataStudents = ref([]);
const chartDataTeachers = ref([]);
const chartOptions = ref([]);
const chartOptions2 = ref([]);
const colors = ref([]);

const random = () =>{
    return Math.floor(Math.random() * 256);
}

//Data Graphic Students
props.data.map( (row) =>(
    subjectsStudents.value.push(row.nombre_subject),
    students.value.push(row.count),
    colors.value.push("rgb("+random()+","+random()+","+random()+")")
));

//Data Graphic Teachers
props.data2.map( (row2) =>(
    subjectsTeachers.value.push(row2.nombre_subject),
    teachers.value.push(row2.count),
    colors.value.push("rgb("+random()+","+random()+","+random()+")")
))

//Graphic Students
chartDataStudents.value = {
    labels:subjectsStudents.value,
    datasets:[
        {label:'Cantidad de Estudiantes por Asignatura', data:students.value, backgroundColor:colors}
    ]
}

//Graphic Teachers
chartDataTeachers.value = {
    labels:subjectsTeachers.value,
    datasets:[
        {label:'Docentes por Asignatura', data:teachers.value, backgroundColor:colors}
    ]
}

chartOptions.value= { responsive:true}
chartOptions2.value= { responsive:true}

</script>

<template>
    <Head title="Estadística" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gráfica de Reporte</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full sm:w-1/2 px-4 mb-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <Bar :data="chartDataStudents" :options="chartOptions"></Bar>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 px-4 mb-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <Pie :data="chartDataTeachers" :options="chartOptions2"></Pie>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
