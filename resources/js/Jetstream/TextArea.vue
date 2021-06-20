<template>
  <textarea
    rows="4"
    class="
      shadow-sm
      focus:ring focus:ring-green-200 focus:ring-opacity-50
      focus:border-green-500
      mt-1
      block
      px-2
      py-2
      w-full
      sm:text-sm
      border border-gray-300
      rounded-md
    "
    :value="modelValue"
    @textarea="$emit('update:modelValue', $event.target.value)"
    ref="textarea"
  />
</template>

<script>
export default {
  props: ["modelValue"],

  emits: ["update:modelValue"],

  methods: {
    focus() {
      this.$refs.textarea.focus();
    },
  },
};
</script>

<style>
</style>