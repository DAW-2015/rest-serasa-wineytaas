#Propriedades do sistema


##Estado


1.  `GET /estados/:id`
    1. parametro: **id** do estado desejado
    2. body: NULL
    3. return: O **id** e o **nome** do estado selecionado

2.  `GET /estados`
    1. parametro: NULL
    2. body: NULL
    3. return: Os **id** e os **nome** de todos os estados

3.  `POST /estados`
    1. parametro: NULL
    2. body: { "nome": "NOME_ESTADO" }
    3. return: Confimação do inserção **Estado Adicionado** ou **Erro ao adicionar estado**

4.  `PUT /estados/:id`
    1. parametro: **id** do estado desejado
    2. body: { "nome": "NOME_ESTADO" }
    3. return: **id** e novo **nome** do estado

5.  `DELETE /estados/:id`
    1. parametro: **id** do estado desejado
    2. body: NULL
    3. return: **Estado excluído**, caso true. **Erro ao excluir estado**, case false

##Cidade


1.  `GET /cidades/:id`
    1. parametro: **id** da cidade desejada
    2. body: NULL
    3. return: O **id**, o **nome** , o **estados_id** e o **nome_estado** da cidade selecionada

2.  `GET /cidades`
    1. parametro: NULL
    2. body: NULL
    3. return: Os **id**, os **nome**, os **estados_id** e os **nome_estado**  de todas as cidades

3.  `POST /cidades`
    1. parametro: NULL
    2. body: { "nome": "NOME_CIDADE" , "estado_id" : "ID_ESTADO"}
    3. return: Confimação do inserção **Cidade Adicionado** ou **Erro ao adicionar cidade**

4.  `PUT /cidades/:id`
    1. parametro: **id** do estado desejado
    2. body: { "nome": "NOME_CIDADE" , "estado_id" : "ID_ESTADO"}
    3. return: O **id**, o **nome** , o **estados_id** e o **nome_estado** atualizados da cidade

5.  `DELETE /cidades/:id`
    1. parametro: **id** da cidade desejada
    2. body: NULL
    3. return: **Cidade excluída**, caso true. **Erro ao excluir cidade**, case false
    

##Cliente


1.  `GET /clientes/:cpf`
    1. parametro: **cpf** do cliente desejada
    2. body: NULL
    3. return: Os dados do cliente **id**, **cpf**, **nome**, **cidade** (**id** , **nome**, **estados_id** )

2.  `GET /clientes`
    1. parametro: NULL
    2. body: NULL
    3. return: Os dados de todos os clientes **id**, **cpf**, **nome**, **cidade_id** 

3.  `POST /clientes`
    1. parametro: NULL
    2. body: { "cpf": "CPF_CLIENETE", "nome": "NOME_CLIENTE", "cidades_id":"CIDADE_ID_CLIENTE" }
    3. return: Os dados do cliente que foi adicionado **id**, **cpf**, **nome**, **cidade** (**id** , **nome**, **estados_id** )

4.  `PUT /clientes/:id`
    1. parametro: **id** do cliente desejado
    2. body: { "cpf": "CPF_CLIENETE", "nome": "NOME_CLIENTE", "cidades_id":"CIDADE_ID_CLIENTE" }
    3. return:  Os dados do cliente que foi atualizado **id**, **cpf**, **nome**, **cidade** (**id** , **nome**, **estados_id** )

5.  `DELETE /clientes/:id`
    1. parametro: **id** do cliente desejado
    2. body: NULL
    3. return: **Cliente excluído**, caso true. **Erro ao excluir cliente**, case false

##Estabelecimento


1.  `GET /estabelecimentos/:cpf`
    1. parametro: **id** do estabelecimento desejado
    2. body: NULL
    3. return: Os dados do estabelecimento **id** , **nome** , **cidade** (**id** , **nome**, **estados_id** )

2.  `GET /estabelecimentos`
    1. parametro: NULL
    2. body: NULL
    3. return: Os dados de todos os clientes **id** , **nome** , **cidade** (**id** , **nome**, **estados_id** )

3.  `POST /estabelecimentos`
    1. parametro: NULL
    2. body: { "nome": "NOME_ESTABELECIMENTO", "cidades_id":"CIDADE_ID_ESTABELECIMENTO" }
    3. return: **Estabelecimento Adicionado**, true. **Erro ao adicionar estabelecimento**, false.

4.  `PUT /estabelecimentos/:id`
    1. parametro: **id** do cliente desejado
    2. body: { "nome": "NOME_ESTABELECIMENTO", "cidades_id":"CIDADE_ID_ESTABELECIMENTO" }
    3. return:  Os dados do estabelecimento que foi atualizado **id** , **nome** , **cidade** (**id** , **nome**, **estados_id** )

5.  `DELETE /estabelecimentos/:id`
    1. parametro: **id** do cliente desejado
    2. body: NULL
    3. return: **Estabelecimento excluído**, caso true. **Erro ao excluir estabelecimento**, case false
    