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
    