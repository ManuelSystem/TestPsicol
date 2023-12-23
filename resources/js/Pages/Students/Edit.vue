<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    semesters: {type:Array},
    student: {type:Object},
});

const form = useForm({
    name: props.student.name,
    document: props.student.document,
    phone: props.student.phone,
    email: props.student.email,
    address: props.student.address,
    city: props.student.city,
    semester: props.student.semester,
});

</script>

<template>
    <Head title="Crear Estudiante" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Estudiante</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$event => form.patch(route('estudiantes.update',student))"
                        class="p-4 mt-6 space-y-6 max-w-screen-xl">
                        
                        <div class="flex flex-wrap -mx-4">
                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="document" value="Documento"></InputLabel>
                                <TextInput id="document" v-model="form.document" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.document" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="name" value="Nombre"></InputLabel>
                                <TextInput id="name" v-model="form.name" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.name" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="phone" value="Teléfono"></InputLabel>
                                <TextInput id="phone" v-model="form.phone" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.phone" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="email" value="Correo Electrónico"></InputLabel>
                                <TextInput id="email" v-model="form.email" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.email" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="address" value="Dirección"></InputLabel>
                                <TextInput id="address" v-model="form.address" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.address" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="city" value="Ciudad"></InputLabel>
                                <TextInput id="city" v-model="form.city" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.city" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="semester" value="Semestre"></InputLabel>
                                <select :id="'semester'" v-model="form.semester" :key="form.semester" 
                                :class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full'" required>
                                    <option :value="null" disabled selected>Selecciona</option>
                                    <option v-for="option in semesters" :key="option" :value="option">{{ option }}</option>
                                </select>
                                <InputError :message="form.errors.semester" class="mt-2"></InputError>
                            </div>
                        </div>

                        <PrimaryButton :disabled="form.processing">
                            <i class="fa-solid fa-save"></i> Guardar
                        </PrimaryButton>

                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
