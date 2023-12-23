<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    subjects: {type:Object}
});

const form = useForm({
    id:''
});

const deletesubject = (id, name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title: 'Estás seguro de eliminar la asignatura '+name+'?',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText: '<i class="fa-solid fa-check"></i>Si, eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i>Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            
            form.delete(route('asignaturas.destroy',id));
        }
    });
}

</script>

<template>
    <Head title="Asignaturas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignaturas</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('asignaturas.create')"
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
                            <th class="px-4 py-4">Nombre</th>
                            <th class="px-4 py-4">Área</th>
                            <th class="px-4 py-4">Descripción</th>
                            <th class="px-4 py-4">Créditos</th>
                            <th class="px-4 py-4">¿Obligatoria?</th>
                            <th class="px-4 py-4">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sub in subjects">
                            <td class="border border-gray-400 px-4 py-4">{{ sub.id }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ sub.name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ sub.area }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ sub.description }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ sub.subject_credits }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                            <td class="px-4 py-4">
                                <span :class="{ 'bg-orange-500 text-white px-2 py-1 rounded': sub.elective === 0, 'bg-green-500 text-white px-2 py-1 rounded': sub.elective === 1 }">
                                    {{ sub.elective === 0 ? 'Si' : 'No' }}
                                </span>
                            </td>

                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('asignaturas.edit', { asignatura: sub.id })"
                                    :class="'px-4 py-2 bg-blue-400  text-white border rounded-md font-semibold text-xs'">
                                    <i class="fa-solid fa-edit"></i> 
                                </Link>
                                <DangerButton @click="$event => deletesubject(sub.id, sub.name)">
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