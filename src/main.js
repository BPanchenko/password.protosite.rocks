import App from "./App.svelte"

const app = new App({
  target: document.body.getElementsByClassName('js-app')[0],
  props: {
    settings: {
      hasLowerCase: true,
      hasUpperCase: false,
      hasSymbols: false,
      hasNumbers: true,
      length: 8
    }
  }
})

export default app