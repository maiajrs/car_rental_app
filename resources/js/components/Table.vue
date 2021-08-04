<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th v-for="(t, key) in titulo" :key="key" scope="col" class="text-uppercase">
                    {{ t }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="obj in dados" :key="obj.id">
                <td v-if="titulo.includes(chave)" v-for="(valor, chave) in obj" :key="chave">
                    <span v-if="chave == 'imagem'">
                        <img :src="'/storage/'+valor" height="30" width="30" :alt="'imagem do carro '+obj.nome">
                    </span>
                    <span v-else>
                        {{valor}}
                    </span>
                </td>
                <!-- <th scope="row">{{m.id}}</th>
                <td>{{m.nome}}</td>
                <td><img width="30" height="30" :src="'storage/'+m.imagem" :alt="m.nome"></td> -->
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ["dados", "titulo"]
};
</script>
