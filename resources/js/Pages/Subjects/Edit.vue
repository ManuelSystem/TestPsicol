<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    booleanelective: {type:Array},
    subject: {type:Object},
});

const form = useForm({
    name:props.subject.name,
    area:props.subject.area,
    description:props.subject.description,
    subject_credits:props.subject.subject_credits,
    elective:props.subject.elective
});
console.log(props);
</script>

<template>
    <Head title="Editar Asignatura" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Asignatura</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$event => form.patch(route('asignaturas.update',subject ))"
                        class="p-4 mt-6 space-y-6 max-w-screen-xl">
                        
                        <div class="flex flex-wrap -mx-4">

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="name" value="Nombre"></InputLabel>
                                <TextInput id="name" v-model="form.name" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.name" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="area" value="Área de Conocimiento"></InputLabel>
                                <TextInput id="area" v-model="form.area" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.area" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="subject_credits" value="Cantidad de Créditos"></InputLabel>
                                <TextInput id="subject_credits" v-model="form.subject_credits" autofocus required
                                        type="number" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.subject_credits" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="elective" value="¿Es Obligatoria?"></InputLabel>
                                <select :id="'elective'" v-model="form.elective" :class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full'" required>
                                    <option :value="null" disabled selected>Selecciona</option>
                                    <option v-for="option in booleanelective" :key="option.value" :value="option.value">{{ option.label }}</option>
                                </select>
                                <InputError :message="form.errors.elective" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/2 px-4 mb-4">
                                <InputLabel for="description" value="Descripción"></InputLabel>
                                <TextInput id="description" v-model="form.description" autofocus required
                                        type="text" class="mt-1 block w-full">
                                </TextInput>
                                <InputError :message="form.errors.description" class="mt-2"></InputError>
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
