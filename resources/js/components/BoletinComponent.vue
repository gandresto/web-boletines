<template>
    <tr>
        <td>{{boletin.candidato}}</td>
        <td>{{boletin.fecha}}</td>
        <td>{{boletin.estado}}</td>
        <td>{{boletin.encabezado}}</td>
    </tr>
</template>
<script>
    export default {
        methods: {
            // update(val) {
            //     this.$emit('update', this.id, val.target.selectedOptions[0].value);
            // },
            // del() {
            //     this.$emit('delete', this.id);
            // }
        },
        props: ['boletin'],
        mounted() {
            // console.log(this.boletin)
        },
    }

</script>
