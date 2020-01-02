import { writable } from 'svelte/store'

export const hasLowerCase = writable(true)
export const hasUpperCase = writable(true)
export const hasSymbols = writable(false)
export const hasNumbers = writable(true)
export const length = writable(8)