<template>
    <div>
        <InputLabel :for="name" :value="label"></InputLabel>
        <select :id="name" v-model="value" :class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'" :required="isRequired">
            <option :value="null" disabled selected>Selecciona {{ label.toLowerCase() }}</option>
            <option v-for="option in options" :key="option.value" :value="option.value">{{ option.label }}</option>
        </select>
        <InputError :message="error" class="mt-2"></InputError>
    </div>
</template>

<script>
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

export default {
    components: {
        InputLabel,
        InputError,
    },
    props: {
        name: String,
        label: String,
        value: [String, Number],
        options: Array,
        error: String,
        isRequired: Boolean,
    },
};
</script>
