<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInputObject from '@/Components/SelectInputObject.vue';
import Swal from 'sweetalert2';

import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    subjects: {type:Object},
    students: {type:Object},
    teachers: {type:Object}
});

const form = useForm({
    student_id: '',
    teacher_id: '',
    subject_id: '',
    credits: 0,
});

const showAlert = () => {
    Swal.fire({
        title: 'Asignación exitosa',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    });
};
</script>

<template>
    <Head title="Asignación de Materias" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignar Asignatura y Docente a Estudiante</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="$event => form.post(route('grupos.store'), { onSuccess: showAlert })"
                        class="p-4 mt-6 space-y-6 max-w-screen-xl">
                        
                        <div class="flex flex-wrap -mx-4">

                            <div class="w-full sm:w-1/3 px-4 mb-4">
                                <InputLabel for="student_id" value="Estudiante"></InputLabel>
                                <SelectInputObject id="student_id" :options="students" v-model="form.student_id" required
                                        type="text" class="mt-1 block w-full">
                                </SelectInputObject>
                                <InputError :message="form.errors.student_id" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/3 px-4 mb-4">
                                <InputLabel for="teacher_id" value="Docente"></InputLabel>
                                <SelectInputObject id="teacher_id" :options="teachers" v-model="form.teacher_id" required
                                        type="text" class="mt-1 block w-full">
                                </SelectInputObject>
                                <InputError :message="form.errors.teacher_id" class="mt-2"></InputError>
                            </div>

                            <div class="w-full sm:w-1/3 px-4 mb-4">
                                <InputLabel for="subject_id" value="Asignatura"></InputLabel>
                                <SelectInputObject id="subject_id" :options="subjects" v-model="form.subject_id" required
                                        type="text" class="mt-1 block w-full" >
                                </SelectInputObject>
                                <InputError :message="form.errors.subject_id" class="mt-2"></InputError>
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
