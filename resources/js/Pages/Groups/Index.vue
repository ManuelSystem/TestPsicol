<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    groups: {type:Object}
});

const form = useForm({
    id:''
});

const deletesubject = (id) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title: 'Estás seguro de eliminar esta asignación?',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText: '<i class="fa-solid fa-check"></i>Si, eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i>Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            
            form.delete(route('grupos.destroy',id));
        }
    });
}
//console.log(props);
</script>

<template>
    <Head title="Materias Asignadas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Materias Asignadas por Estudiantes y Docentes</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('grupos.create')"
                    :class="'px-4 py-2 bg-gray-800  text-white border rounded-md font-semibold text-xs'">
                    <i class="fa-solid fa-plus-circle"></i> Agregar
                    </Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Estudiante</th>
                            <th class="px-4 py-4">Docente</th>
                            <th class="px-4 py-4">Asignatura</th>
                            <th class="px-4 py-4">N° Créditos</th>
                            <th class="px-4 py-4">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="grups in groups">
                            <td class="border border-gray-400 px-4 py-4">{{ grups.id }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ grups.student[0].name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ grups.teacher[0].name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ grups.subject[0].name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ grups.subject[0].subject_credits }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="$event => deletesubject(grups.id)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>