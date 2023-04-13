<script>
export default {
    props: ['name','id',"value"],
    emits: ['update:modelValue'],
}
</script>

<template>
    <div class="flex items-center">
        <input type="radio" :id="id" :name="name" :value="value"
        @input="$emit('update:modelValue', $event.target.value)">
        <label class="text-3xl font-medium ml-6" :for="id">{{ value }}</label>
    </div>
</template>