<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- inicio card de busca -->
                <card-component titulo="Buscar de Marcas">
                    <template v-slot:conteudo>
                        <div class="row">
                            <div class="col mb-3">
                                <input-container-component
                                    id="inputID"
                                    titulo="ID"
                                    id-help="helpID"
                                    text-help="Opcional. Informe o ID do registro."
                                >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="inputID"
                                        aria-describedby="helpID"
                                        placeholder="ID"
                                        v-model="busca.id"
                                    />
                                </input-container-component>
                            </div>
                            <div class="col mb-3">
                                <input-container-component
                                    id="inputNome"
                                    titulo="Nome da marca"
                                    id-help="helpNome"
                                    text-help="Opcional. Informe o nome da marca."
                                >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="inputNome"
                                        aria-describedby="helpNome"
                                        placeholder="Nome da Marca"
                                        v-model="busca.nome"
                                    />
                                </input-container-component>
                            </div>
                        </div>
                    </template>
                    <template v-slot:rodape>
                        <button
                            type="submit"
                            class="btn btn-primary float-right"
                            @click="pesquisar()"
                        >
                            Pesquisar
                        </button>
                    </template>
                </card-component>
                <!-- fim card de busca -->

                <!-- inicio card de listagem -->
                <card-component titulo="Listagem de Marcas">
                    <template v-slot:conteudo>
                        <table-component
                            :visualizar="{
                                visivel: true,
                                dataToggle: 'modal',
                                dataTarget: '#modalMarcaVisualizar'
                            }"
                            :atualizar="{
                                visivel: true,
                                dataToggle: 'modal',
                                dataTarget: '#modalMarcaAtualizar'
                            }"
                            :remover="{
                                visivel: true,
                                dataToggle: 'modal',
                                dataTarget: '#modalMarcaRemover'
                            }"
                            :dados="marcas.data"
                            :titulos="{
                                id: { titulo: 'ID', tipo: 'texto' },
                                nome: { titulo: 'Nome', tipo: 'texto' },
                                imagem: { titulo: 'Imagem', tipo: 'imagem' },
                                created_at: {
                                    titulo: 'Data de criação',
                                    tipo: 'data'
                                }
                            }"
                        ></table-component>
                    </template>
                    <template v-slot:rodape>
                        <div class="row">
                            <div class="col-10">
                                <paginate-component>
                                    <li
                                        v-for="(l, key) in marcas.links"
                                        :key="key"
                                        :class="
                                            l.active
                                                ? 'page-item active'
                                                : 'page-item'
                                        "
                                        @click="paginacao(l)"
                                    >
                                        <a
                                            class="page-link"
                                            v-html="l.label"
                                            style="cursor: pointer"
                                        ></a>
                                    </li>
                                </paginate-component>
                            </div>
                            <div class="col">
                                <button
                                    type="button"
                                    class="btn btn-primary float-right"
                                    name="rodape"
                                    data-toggle="modal"
                                    data-target="#modalMarcas"
                                >
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </template>
                </card-component>
            </div>
        </div>
        <!-- inicio modal de inclusão de marcas -->
        <modal-component id="modalMarcas" titulo="Adicionar marca">
            <template v-slot:alertas>
                <alert-component
                    :detalhes="transacaoDetalhes"
                    titulo="O registro foi inserido com sucesso"
                    tipo="success"
                    v-if="transacaoStatus == 'adicionado'"
                ></alert-component>
                <alert-component
                    :detalhes="transacaoDetalhes"
                    titulo="Um erro ocorreu ao fazer o registro"
                    tipo="danger"
                    v-if="transacaoStatus == 'erro'"
                ></alert-component>
            </template>

            <template v-slot:conteudo>
                <div class="form-group">
                    <input-container-component
                        id="novoNome"
                        titulo="Nome da marca"
                        id-help="novoNomeHelp"
                        text-help="Informe o nome da marca."
                    >
                        <input
                            type="text"
                            class="form-control"
                            id="novoNome"
                            aria-describedby="novoNomeHelp"
                            placeholder="Nome da marca"
                            v-model="nomeMarca"
                        />
                    </input-container-component>
                </div>
                <div class="form-group">
                    <input-container-component
                        id="novoImagem"
                        titulo="Imagem"
                        id-help="novoImagemHelp"
                        text-help="Selecione uma imagem no formato PNG."
                    >
                        <input
                            type="file"
                            class="form-control-file"
                            id="novoImagem"
                            aria-describedby="novoImagemHelp"
                            placeholder="Selecione uma imagem"
                            @change="carregarImagem($event)"
                        />
                    </input-container-component>
                </div>
            </template>
            <template v-slot:rodape>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Fechar
                </button>
                <button type="button" class="btn btn-primary" @click="salvar()">
                    Salvar
                </button>
            </template>
        </modal-component>
        <!-- fim modal de inclusão de marcas -->

        <!-- inicio modal de visualização de detalhes de marca -->
        <modal-component id="modalMarcaVisualizar" titulo="Visualizar marca">
            <template v-slot:alertas></template>
            <template v-slot:conteudo>
                <input-container-component titulo="ID">
                    <input
                        type="text"
                        class="form-control"
                        :value="$store.state.item.id"
                        disabled
                    />
                </input-container-component>
                <input-container-component titulo="Nome">
                    <input
                        type="text"
                        class="form-control"
                        :value="$store.state.item.nome"
                        disabled
                    />
                </input-container-component>
                <input-container-component titulo="Imagem">
                    <img
                        :src="'storage/' + $store.state.item.imagem"
                        v-if="$store.state.item.imagem"
                    />
                </input-container-component>
                <input-container-component titulo="Data de criação">
                    <input
                        type="text"
                        class="form-control"
                        :value="$store.state.item.created_at"
                        disabled
                    />
                </input-container-component>
            </template>
            <template v-slot:rodape>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Fechar
                </button>
            </template>
        </modal-component>
        <!-- fim modal de visualização de detalhes de marca -->

        <!-- inicio modal de atualização de marcas -->
        <modal-component id="modalMarcaAtualizar" titulo="Adicionar marca">
            <template v-slot:alertas>
                <alert-component
                    :detalhes="$store.state.transacao"
                    titulo="O registro foi atualizado com sucesso"
                    tipo="success"
                    v-if="$store.state.transacao.status === 'sucesso'"
                ></alert-component>
                <alert-component
                    :detalhes="$store.state.transacao"
                    titulo="Um erro ocorreu ao fazer o registro"
                    tipo="danger"
                    v-if="$store.state.transacao.status === 'erro'"
                ></alert-component>
            </template>

            <template v-slot:conteudo>
                <div class="form-group">
                    <input-container-component
                        id="atualizarNome"
                        titulo="Nome da marca"
                        id-help="atualizarNomeHelp"
                        text-help="Informe o nome da marca."
                    >
                        <input
                            type="text"
                            class="form-control"
                            id="atualizarNome"
                            aria-describedby="atualizarNomeHelp"
                            placeholder="Nome da marca"
                            v-model="$store.state.item.nome"
                        />
                    </input-container-component>
                </div>
                <div class="form-group">
                    <input-container-component
                        id="atualizarImagem"
                        titulo="Imagem"
                        id-help="atualizarImagemHelp"
                        text-help="Selecione uma imagem no formato PNG."
                    >
                        <input
                            type="file"
                            class="form-control-file"
                            id="atualizarImagem"
                            aria-describedby="atualizarImagemHelp"
                            placeholder="Selecione uma imagem"
                            @change="carregarImagem($event)"
                        />
                    </input-container-component>
                </div>
            </template>
            <template v-slot:rodape>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Fechar
                </button>
                <button
                    type="button"
                    class="btn btn-primary"
                    @click="atualizar()"
                >
                    Atualizar
                </button>
            </template>
        </modal-component>
        <!-- fim modal de atualização de marcas -->

        <!-- inicio modal de remoção de marca -->
        <modal-component id="modalMarcaRemover" titulo="Deletar marca">
            <template v-slot:alertas>
                <alert-component
                    tipo="success"
                    titulo="Transação realizada com sucesso"
                    :detalhes="$store.state.transacao"
                    v-if="$store.state.transacao.status == 'sucesso'"
                ></alert-component>
                <alert-component
                    tipo="danger"
                    titulo="Erro na transação"
                    :detalhes="$store.state.transacao"
                    v-if="$store.state.transacao.status == 'erro'"
                ></alert-component>
            </template>
            <template
                v-slot:conteudo
                v-if="$store.state.transacao.status != 'sucesso'"
            >
                <input-container-component titulo="ID">
                    <input
                        type="text"
                        class="form-control"
                        :value="$store.state.item.id"
                        disabled
                    />
                </input-container-component>
                <input-container-component titulo="Nome">
                    <input
                        type="text"
                        class="form-control"
                        :value="$store.state.item.nome"
                        disabled
                    />
                </input-container-component>
            </template>
            <template v-slot:rodape>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Fechar
                </button>
                <button
                    type="button"
                    class="btn btn-danger"
                    @click="remover()"
                    v-if="$store.state.transacao.status != 'sucesso'"
                >
                    Remover
                </button>
            </template>
        </modal-component>
        <!-- fim modal de remoção de marca -->
    </div>
</template>

<script>
import Alert from "./Alert.vue";
export default {
    components: { Alert },
    data() {
        return {
            baseURL: "http://localhost:8000/api/v1/marca",
            urlPaginacao: "",
            urlFiltro: "",
            nomeMarca: "",
            arquivoImagem: [],
            transacaoStatus: "",
            transacaoDetalhes: [],
            marcas: { data: [] },
            busca: {
                id: "",
                nome: ""
            }
        };
    },
    methods: {
        atualizar() {
            const url = this.baseURL + "/" + this.$store.state.item.id;

            const formData = new FormData();
            formData.append("_method", "PATCH");
            formData.append("nome", this.$store.state.item.nome);

            if (this.arquivoImagem[0]) {
                formData.append("imagem", this.arquivoImagem[0]);
            }

            const config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                }
            };

            axios
                .post(url, formData, config)
                .then(response => {
                    atualizarImagem.value = ''
                    this.$store.state.transacao.status = "sucesso";
                    this.$store.state.transacao.message = "O registro de marca foi atualizado com sucesso";
                    this.carregarLista();
                })
                .catch(erros => {
                    this.$store.state.transacao.status = "erro";
                    this.$store.state.transacao.message = erros.response.data.message;
                    this.$store.state.transacao.dados =
                        erros.response.data.errors;
                });
        },
        remover() {
            const confirmacao = confirm(
                "Tem certeza que deseja remover o registro?"
            );
            if (!confirmacao) return false;

            const url = `${this.baseURL}/${this.$store.state.item.id}`;
            const formData = new FormData();
            formData.append("_method", "delete");

            this.$store.state.transacao.status = "erros";
            axios
                .post(url, formData)
                .then(response => {
                    this.carregarLista();
                    this.$store.state.transacao.status = "sucesso";
                    this.$store.state.transacao.message = response.data.msg;
                })

                .catch(errors => {
                    this.$store.state.transacao.status = "erro";
                    this.$store.state.transacao.message =
                        errors.response.data.erro;
                });
        },
        pesquisar() {
            let filtro = "";

            for (let chave in this.busca) {
                if (this.busca[chave]) {
                    if (filtro != "") {
                        filtro += ";";
                    }
                    filtro += chave + ":like:" + this.busca[chave];
                }
            }

            if (filtro != "") {
                this.urlPaginacao = "page=1";
                this.urlFiltro = "&filtro=" + filtro;
            } else {
                this.urlFiltro = "";
            }
            this.carregarLista();
        },
        paginacao(l) {
            let url = l.url.split("?")[1];
            this.urlPaginacao = url;
            if (l.url) {
                this.carregarLista();
            }
        },
        carregarLista() {
            let url = this.baseURL + "?" + this.urlPaginacao + this.urlFiltro;
            let config = {
                headers: {
                    Authorization: this.token
                }
            };
            axios
                .get(url, config)
                .then(response => {
                    this.marcas = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },

        carregarImagem(e) {
            this.arquivoImagem = e.target.files;
        },
        salvar() {
            let formData = new FormData();
            formData.append("nome", this.nomeMarca);
            formData.append("imagem", this.arquivoImagem[0]);

            let configs = {
                headers: {
                    "Content-Type": "multipart/form-data",
                }
            };

            axios
                .post(this.baseURL, formData, configs)
                .then(res => {
                    this.transacaoStatus = "adicionado";
                    this.transacaoDetalhes = {
                        message: "ID do registro inserido: " + res.data.id
                    };
                })
                .catch(errors => {
                    this.transacaoStatus = "erro";
                    this.transacaoDetalhes = {
                        message: errors.response.data.message,
                        dados: errors.response.data.errors
                    };
                });
        }
    },
    mounted() {
        this.carregarLista();
    }
};
</script>
