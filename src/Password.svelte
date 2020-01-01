<script>
    export let value
</script>

<h2 class="o-password" style="min-width: {value.length}ch;">
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
