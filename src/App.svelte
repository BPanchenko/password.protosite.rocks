<script>
    import { onMount } from 'svelte'

    const LETTERS = "zyxwvutsrqponmlkjihgfedcba"
    const NUMBERS = "9876543210"
    const SYMBOLS = "%*()?@#$~"
    
    let form, txtLength, chxLowerCase, chxUpperCase, chxSymbols, chxNumbers

    export let psw = generatePassword()
    let psw_hystory = []
    let psw_length = 8

    onMount(() => {
        form = document.querySelector('.js-psw-options')
        txtLength = form.querySelector('input[name=length]')
        chxLowerCase = form.querySelector('input[name=lower-case]')
        chxUpperCase = form.querySelector('input[name=upper-case]')
        chxSymbols = form.querySelector('input[name=symbols]')
        chxNumbers = form.querySelector('input[name=numbers]')
    });
    
    let onClickReload = () => {
        psw && (psw_hystory = [psw, ...psw_hystory.slice(0, 9)])
        psw = generatePassword({
            hasLowerCase: chxLowerCase.checked,
            hasUpperCase: chxUpperCase.checked,
            hasSymbols: chxSymbols.checked,
            hasNumbers: chxNumbers.checked,
            length: psw_length
        })
    }
    
    let onSubmitForm = () => {
        psw = generatePassword({
            hasLowerCase: chxLowerCase.checked,
            hasUpperCase: chxUpperCase.checked,
            hasSymbols: chxSymbols.checked,
            hasNumbers: chxNumbers.checked,
            length: psw_length
        })
    }

    export function generatePassword(options = {
        hasLowerCase: true,
        hasUpperCase: false,
        hasSymbols: false,
        hasNumbers: true,
        length: 8
    }) {
        let { hasLowerCase, hasUpperCase, hasSymbols, hasNumbers, length } = options
        let psw = ''
        let alphabet = ''

        if (hasLowerCase) alphabet += LETTERS
        if (hasUpperCase) alphabet += LETTERS.toUpperCase()
        if (hasSymbols) alphabet += SYMBOLS
        if (hasNumbers) alphabet += NUMBERS

        if (alphabet.length) for (let i = 0; i < length; i++) {
            psw += alphabet[Math.round(Math.random() * (alphabet.length - 1))]
        }

        return psw
    }
</script>

<div class="o-grid">
    <div class="o-grid__cell u-width-1-2">

        <section>
            <h2 class="u-display-inline-block u-text-center" style="min-width: {psw_length}ch; outline: 0.1rem dotted grey;">{psw}</h2>
            <a href="#" class="c-button-icon u-margin-left" on:click|preventDefault={onClickReload}>
                <i class="iconic" data-glyph="reload"></i>
            </a>
            {#if psw_hystory.length > 0}
                <ul>
                {#each psw_hystory as psw_hystory_item}
                    <li>{psw_hystory_item}</li>
                {/each}
                </ul>
            {/if}
        </section>

    </div>
    <div class="o-grid__cell u-width-1-2">

        <section class="c-panel">
            <div class="c-panel__head">
                <h3>Настройки генератора пароля</h3>
            </div>
            <div class="c-panel__body">
                <form class="o-form js-psw-options" on:change={onSubmitForm}>
                    <label class="o-form__row c-field-box">
                        <span class="c-field-label">Длинна пароля: {psw_length}</span>
                        <input type="range" name="length" min="3" max="24" value="{psw_length}" class="c-field" on:change="{e => psw_length = e.target.value}">
                    </label>
                    <label class="o-form__row">
                        <input type="checkbox" name="numbers" class="c-field" checked>
                        <span class="c-field-label">Цифры</span>
                    </label>
                    <label class="o-form__row">
                        <input type="checkbox" name="upper-case" class="c-field">
                        <span class="c-field-label">Прописные буквы</span>
                    </label>
                    <label class="o-form__row">
                        <input type="checkbox" name="lower-case" class="c-field" checked>
                        <span class="c-field-label">Строчные буквы</span>
                    </label>
                    <label class="o-form__row">
                        <input type="checkbox" name="symbols" class="c-field">
                        <span class="c-field-label">Символы <q>{SYMBOLS}</q></span>
                    </label>
                </form>
            </div>
        </section>

    </div>
</div>

<style>
    @import url("http://uikit.protosite.rocks/assets/uikit.css");

    .o-form__row {
        justify-content: flex-start;
    }

    .o-form__buttons {
        text-align: left;
    }
</style>