<script>
    export let value
    let container

    function selectNode(node) {
        if (document.body.createTextRange) {
            const range = document.body.createTextRange()
            range.moveToElementText(node)
            range.select()
        } else if (window.getSelection) {
            const selection = window.getSelection()
            const range = document.createRange()
            range.selectNodeContents(node)
            selection.removeAllRanges()
            selection.addRange(range)
        } else {
            console.warn("Could not select text in node: Unsupported browser.")
        }
    }
</script>

<h2 bind:this={container} on:click|preventDefault={() => selectNode(container)} class="o-password" style="min-width: {value.length}ch;">
    {value}
</h2>

<style>
    .o-password {
        display: inline-block;
        outline: 0.1rem dotted grey;
        text-align: center;
        cursor: pointer;
    }

    @media screen and (max-width: 980px) {
        .o-password {
            word-break: break-all;
        }
    }

</style>
