#Propriedades do sistema
##Estado


1.  `GET /estados/:id`
    1. parametro: **id** do estado desejado
    3. body: NULL
    2. return: O **id** e o **nome** do estado selecionado

2.  `GET /estados`
    1. return: Lista de estados

3.  `POST /estados`
    1. parametros: { "nome": "ESTADO_NAME" }
    2. return: Confimação do inserção

4.  `PUT /estados/:id`
    1. parametros: { "nome": "ESTADO_NAME" }
    2. return: Estado com o novo nome

5.  `DELETE /estados/:id`
    1. parametros: NULL
    2. return: True/False