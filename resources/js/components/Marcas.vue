<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Buscar de Marcas</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <input-container-component id="inputID" titulo="ID" id-help="helpID" text-help="Opcional. Informe o ID do registro.">
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
                                <input-container-component id="inputNome" titulo="Nome da marca" id-help="helpNome" text-help="Opcional. Informe o nome da marca.">
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
                        <button type="submit" class="btn btn-primary float-right">
                            Pesquisar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
