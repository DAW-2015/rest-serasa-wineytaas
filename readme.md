#Propriedades do sistema
##Estado
1. Tabela no DAO
    1. nome: serasa_estados
    2. elementos {id,nome}

2.  `GET /estados/:id`
    1. parametro: **id** do estado desejado
    3. body: NULL
    2. return: O **id** e o **nome** do estado selecionado

3.  `GET /estados`
    1. return: Lista de estados

4.  `POST /estados`
    1. parametros: { "nome": "ESTADO_NAME" }
    2. return: Confimação do inserção

5.  `PUT /estados/:id`
    1. parametros: { "nome": "ESTADO_NAME" }
    2. return: Estado com o novo nome

6.  `DELETE /estados/:id`
    1. parametros: NULL
    2. return: True/False