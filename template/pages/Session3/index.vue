<template lang="pug">
.table
  a-row(type="flex" justify="end")
    a-button(@click="addEmployee") Add Employee
  a-row.mt-2
    a-table(
      :columns="columns"
      :data-source="employees"
      :loading="loading"
      :row-key="(record) => record.empid"
    )
      span(slot="action" slot-scope="text, record")
        a-row(type="flex" justify="space-between")
          a-col(:span="12")
            a-button(type="primary" @click="handleEdit(record)") Edit
          a-col(:span="12")
            a-button(type="danger" @click="handleDelete(record.empid)") Delete
  modal-add-employee(ref="addEmployee" @added="fetchEmployees")
  modal-edit-employee(ref="editEmployee" @edited="fetchEmployees")
</template>
<script>
const columns = [
  {
    title: 'Name',
    dataIndex: 'name',
    key: 'name',
    scopedSlots: { customRender: 'name' }
  },
  {
    title: 'Email',
    dataIndex: 'email',
    key: 'email'
  },
  {
    title: 'Address',
    dataIndex: 'address',
    key: 'address'
  },
  {
    title: 'Phone',
    key: 'phone',
    dataIndex: 'phone'
  },
  {
    title: 'Action',
    key: 'action',
    scopedSlots: { customRender: 'action' },
    width: '200px'
  }
]

export default {
  name: 'Session3',
  data() {
    return {
      loading: false,
      employees: null,
      record: null,
      columns
    }
  },
  mounted() {
    this.fetchEmployees()
  },
  methods: {
    async fetchEmployees() {
      this.loading = true
      this.employees = await this.$api.getEmployee()
      this.loading = false
    },
    handleEdit(record) {
      this.$refs.editEmployee.showModal({ ...record })
    },
    async handleDelete(id) {
      await this.$api.deleteEmployee({ empid: id })
      this.fetchEmployees()
    },
    addEmployee() {
      this.$refs.addEmployee.showModal()
    }
  }
}
</script>
