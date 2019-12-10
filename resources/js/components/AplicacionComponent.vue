<template>
<div class="row justify-content-start pt-md-4">
    <div class="col-sm-12 col-md-3">
        <div class="container">
            <div class="card-header">
                Filtros
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-9">
        <div class="container">
            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Candidato</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Encabezado</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Mandamos boletin como prop por cada elemento en boletines -->
                    <boletin-component
                        v-for="boletin in boletines"
                        v-bind:boletin="boletin"
                        :key="boletin.id"
                    ></boletin-component>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            // this.read()
        },
        data() {
            return {
                boletines: []
            }
        },
        methods: {
            create(){

            },
            read(){
                window.axios.get('/api/boletines').then(({ data }) => {
                    console.log(data)
                    data['data'].forEach(boletin => {
                        this.boletines.push(boletin);
                    });
                });
            },
            update(){

            },
            del(){

            }
        },
        created() {
           this.read();
        }
    }
</script>
