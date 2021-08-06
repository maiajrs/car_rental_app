<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th
                    v-for="(t, key) in titulo"
                    :key="key"
                    scope="col"
                    class="text-uppercase"
                >
                    {{ t.titulo }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="obj, chave in dadosFiltrados" :key="chave">
                <td v-for="valor, chaveValor in obj" :key="chaveValor">
                    <span v-if="chaveValor == 'imagem'">
                        <img width="30" height="30" :src="'/storage/'+valor" :alt="'imagem do carro ' + valor">
                    </span>
                    <span v-else-if="chaveValor == 'created_at'">
                        {{}}
                    </span>
                    <span v-else>{{valor}}</span>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ["dados", "titulo"],
    computed: {
        dadosFiltrados() {
            const keysTitulo = Object.keys(this.titulo)
            const keysObjs = this.dados.map((obj) => {

                let itemFiltrado = {}
               keysTitulo.forEach((campo) => {
                   itemFiltrado[campo] = obj[campo]
               })

               return itemFiltrado
            })
            return keysObjs
        }
    }
};
</script>
