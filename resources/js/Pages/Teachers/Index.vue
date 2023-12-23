<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    teachers: {type:Object}
});

const form = useForm({
    id:''
});

const deleteteacher = (id, name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title: 'Estás seguro de eliminar al docente '+name+'?',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText: '<i class="fa-solid fa-check"></i>Si, eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i>Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            
            form.delete(route('profesores.destroy',id));
        }
    });
}

</script>

<template>
    <Head title="Profesores" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profesores</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('profesores.create')"
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
                            <th class="px-4 py-4">Doc.</th>
                            <th class="px-4 py-4">Nombres</th>
                            <th class="px-4 py-4">Teléfono</th>
                            <th class="px-4 py-4">Correo</th>
                            <th class="px-4 py-4">Dirección</th>
                            <th class="px-4 py-4">Ciudad</th>
                            <th class="px-4 py-4">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="teach in teachers">
                            <td class="border border-gray-400 px-4 py-4">{{ teach.id }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ teach.document }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ teach.name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ teach.phone }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ teach.email }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ teach.address }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ teach.city }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('profesores.edit', { profesore: teach.id })"
                                    :class="'px-4 py-2 bg-blue-400  text-white border rounded-md font-semibold text-xs'">
                                    <i class="fa-solid fa-edit"></i> 
                                </Link>
                                <DangerButton @click="$event => deleteteacher(teach.id, teach.name)">
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