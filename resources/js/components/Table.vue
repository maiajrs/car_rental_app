<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th v-for="t, key in titulo" :key="key" scope="col">{{t}}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="m in dados" :key="m.id">
                <th scope="row">{{m.id}}</th>
                <td>{{m.nome}}</td>
                <td><img width="30" height="30" :src="'storage/'+m.imagem" :alt="m.nome"></td>
            </tr>

        </tbody>
    </table>
</template>

<script>
export default {
    props: ['dados', 'titulo'],

};
</script>
