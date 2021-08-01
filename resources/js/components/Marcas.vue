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
                                    />
                                </input-container-component>
                            </div>
                        </div>
                    </template>
                    <template v-slot:rodape>
                        <button
                            type="submit"
                            class="btn btn-primary float-right"
                        >
                            Pesquisar
                        </button>
                    </template>
                </card-component>
                <!-- fim card de busca -->

                <!-- inicio card de listagem -->
                <card-component titulo="Listagem de Marcas">
                    <template v-slot:conteudo>
                        <table-component></table-component>
                    </template>
                    <template v-slot:rodape>
                        <button
                            type="button"
                            class="btn btn-primary float-right"
                            name="rodape"
                            data-toggle="modal"
                            data-target="#modalMarcas"
                        >
                            Adicionar
                        </button>
                    </template>
                </card-component>
            </div>
        </div>
        <modal-component id="modalMarcas" titulo="Adicionar marca">
            <template v-slot:conteudo>
                <div class="form-group">
                    <input-container-component
                        id="novoNome"
                        titulo="Nome da marca"
                        id-help="novoNomeHelp"
                        text-help="Informe o da marca."
                    >
                        <input
                            type="text"
                            class="form-control"
                            id="novoNome"
                            aria-describedby="novoNomeHelp"
                            placeholder="Nome da marca"
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
                <button type="button" class="btn btn-primary">
                    Salvar
                </button>
            </template>
        </modal-component>
    </div>
</template>
