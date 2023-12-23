<!-- SweetAlert.vue -->
<script setup>
  import Swal from 'sweetalert2';
  
  const showSuccessAlert = () => {
    Swal.fire({
        title: 'Registro exitoso',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    });
  };
  
</script>
<template>
    <div></div>
  </template>
  
  
  