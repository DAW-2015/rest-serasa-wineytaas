#Propriedades do sistema
##Estado
1. Tabela no DAO
    1. nome: serasa_estados
    2. elementos {id,nome}
2.  `get /estados/:id`
    1. return: O id e o nome do estado selecionado

3.  `get /estados`
    1. return: Lista de estados

3.  `post /estados`
    1. parametros: { "nome": "ESTADO_NAME" }
    2. return: Confimação do inserção