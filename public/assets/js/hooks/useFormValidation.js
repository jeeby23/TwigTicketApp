
import { ref } from 'vue'

export function useFormValidation(initialFields = []) {
  const errors = ref({})

  const validateRequired = (fields) => {
    errors.value = {}
    let valid = true

    for (const field of initialFields) {
      if (!fields[field] || !fields[field].trim()) {
        errors.value[field] = `${field.charAt(0).toUpperCase() + field.slice(1)} is required`
        valid = false
      }
    }

    return valid
  }

  return {
    errors,
    validateRequired
  }
}