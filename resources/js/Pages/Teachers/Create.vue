<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Swal from 'sweetalert2';

import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name:'',
    document:'',
    phone:'',
    email:'',
    address:'',
    city:''
});

const showAlert = () => {
    Swal.fire({
        title: 'Registro exitoso',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    });
};
</script>

<template>
    <Head title="Crear Profesor" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Profesor</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$event => form.post(route('profesores.store'), { onSuccess: showAlert })"
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
