<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- inicio card de busca -->
                <div class="card mb-3">
                    <div class="card-header">Buscar de Marcas</div>
                    <div class="card-body">
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
                    </div>
                    <div class="card-footer">
                        <button
                            type="submit"
                            class="btn btn-primary float-right"
                        >
                            Pesquisar
                        </button>
                    </div>
                </div>
                <!-- fim card de busca -->

                <!-- inicio card de listagem -->
                <div class="card">
                    <div class="card-header">Listagem de Marcas</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-primary float-right"
                        >
                            Adicionar
                        </button>
                    </div>
                </div>
                <!-- fim card de listagem -->
            </div>
        </div>
    </div>
</template>
