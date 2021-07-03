// eslint-disable-next-line prettier/prettier
export default function ({ $axios }, inject) {
  const axios = $axios.create({
    headers: {
      common: {
        ContentType: 'application/json',
        Accept: 'application/json'
      }
    }
  })

  const api = {
    // Unique validate
    getEmployee: () => axios.$get(`/Session3/api/getEmployee.php`),
    addEmployee: (data) => axios.$post(`/Session3/api/employee.php`, data),
    editEmployee: (data) => axios.$put(`/Session3/api/employee.php`, data),
    deleteEmployee: (id) => axios.$post(`/Session3/api/deleteEmployee.php`, id)
  }
  inject('api', api)
}
