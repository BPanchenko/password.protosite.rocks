import App from "./App.svelte";

const app = new App({
  target: document.body.getElementsByClassName('js-app')[0]
});

console.log(app)

export default app;