<template lang="pug">
a-modal(v-model="visible" :footer="false")
  h1 Edit Employee
  a-form-model(:label-col="{ span: 4 }" :wrapper-col="{ span: 18 }")
    a-form-model-item(label="Name" required)
      a-input(v-model="form.name")
    a-form-model-item(label="Email" required)
      a-input(v-model="form.email")
    a-form-model-item(label="Address" required)
      a-input(v-model="form.address")
    a-form-model-item(label="Phone" required)
      a-input(v-model="form.phone")

    a-row.mt-3(type="flex" justify="center")
      a-button(type="primary" @click="submitForm") Submit
</template>

<script>
export default {
  name: 'EditEmployee',
  data() {
    return {
      visible: false,
      form: {
        name: null,
        email: null,
        address: null,
        phone: null
      }
    }
  },
  methods: {
    showModal(record) {
      this.form = { ...record }
      this.visible = true
    },
    async submitForm() {
      await this.$api.editEmployee(this.form)
      this.form = {}
      this.visible = false
      this.$emit('edited')
    }
  }
}
</script>
