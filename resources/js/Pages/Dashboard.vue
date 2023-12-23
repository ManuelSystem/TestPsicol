<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <strong>Prueba Psicol S.A.S - Reto Desarrollador Junior: Sistema de asignación de materias</strong>
                        <p class="text-gray-900">
                            Este test está desarrollado bajo el framework Laravel 9.19 junto con Vuejs a través de Inertia.js el cual es como un adaptador
                            para trabajar con los 2 framework. Inertia no es un framework, ni es un reemplazo para estos 2 frameworks existentes del lado del servidor o del lado del cliente. Más bien, está diseñado para funcionar con ellos.
                            <br>
                            Para más detalle de la tecnología con la que e trabajado mirar aquí -> <a href="https://inertiajs.com/" class=" text-violet-700">InertiaJs</a>
                            <br>
                            Para estilos lo trabajé con tailwindcss, base de datos con MySQL y como servidor desarrollo local usé Vitejs. Para más detalles de las paqueterias
                            usadas ver el composer.json en la raíz del proyecto.
                        </p>
                        <img alt="imagen web" class="mx-auto max-w-2xl py-3"
                            src="https://res.cloudinary.com/practicaldev/image/fetch/s--GdRbwQw5--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/lds4o7hrd51cqiktzzv4.png" 
                        >
                        <p class="text-gray-900 py-3">
                            Para el sistema de autenticación, mismo Laravel nos ofrece esta funcionalidad al momento de instalar el project, esto mediante Laravel Breeze,
                            el cual esta es una implementación mínima y simple de todas las funciones de autenticación de Laravel , incluido el inicio de sesión, el registro, 
                            el restablecimiento de contraseña, la verificación de correo electrónico y la confirmación de contraseña. Además, Breeze incluye una página de "perfil" sencilla donde el usuario puede actualizar su nombre, dirección de correo electrónico y contraseña.
                            <br>
                            Para más detalle de la tecnología mirar aquí -> <a href="https://github.com/laravel/breeze" class=" text-violet-700">InertiaJs</a>
                        </p>

                        <p class="text-gray-900 py-3">
                            Las funcionalidades realizadas fueron:
                            <ul class="list-disc p-3">
                                <li>CRUD de estudiantes</li>
                                <li>CRUD de docentes</li>
                                <li>CRUD de asignaturas</li>
                                <li>Registrar y eliminar vinculo de estudiantes y docentes con materias (Módulo Grupos)</li>
                                <li>Reporte de Cantidad de estudiantes por materia (Gráfica)</li>
                                <li>Reporte de Cantidad de docentes por materia (Gráfica)</li>
                                <li>Validación de estudiante con misma asignatura y diferente profesor al momento de registrar</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
