<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Buscar de Marcas</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label
                                    for="inputID"
                                    class="form-label"
                                    >ID</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="inputID"
                                    aria-describedby="helpID"
                                />
                                <div
                                    id="helpID"
                                    class="form-text text-muted"
                                >
                                   Opcional. Informe o ID do registro.
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="inputNome"
                                    class="form-label"
                                    >Nome</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="inputNome"
                                    aria-describedby="helpNome"
                                />
                                <div
                                    id="helpNome"
                                    class="form-text text-muted"
                                >
                                    Opcional. Informe o nome da marca.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">
                            Pesquisar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
