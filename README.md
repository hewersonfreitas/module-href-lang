# Modulo Identificador de Língua

O objetivo desse modulo para Magento 2, é identificar qual língua atual está sendo carregada e exibir um padrão de "meta-tag" para páginas CMS em Multi Sites.


# Features

 - [ ] Adicione um bloco à head;
 - [ ] O bloco deve ser capaz de identificar o id da página CMS e verificar se a página é usada em múltiplos views/stores loja;
 - [ ] Adicionar uma meta tag hreflang ao cabeçalho;
 - [ ] Se a metatag for exibida - ela deve exibir o idioma da loja, como “en-gb”, “en-us”, etc. As metatag devem ter valores específicos para cada país;
 - [ ] Apoie o fato de que cada loja deve ter um par de idiomas diferente.


## Instalação via Composer

Para instalar via composer devemos editar o **composer.json** do seu projeto Magento.

Edite o arquivo `composer.json` **na raiz do Magento** e busque pelo bloco `repositories`

Originalmente ela é assim:

```json
    ...
    "repositories": [
        {
            "type": "composer",
            "url": "https://repo.magento.com/"
        }
    ],
    ...
```
Adicione a linha abaixo:
```json
{
	"type": "vcs",
	"url": "https://github.com/hewersonfreitas/module-href-lang.git"
}
```

Resultado final para o bloco `repositories` vai ficar assim:

```json
    ...
    "repositories": [
        {
            "type": "composer",
            "url": "https://repo.magento.com/"
        },
        {
			"type": "vcs",
			"url": "https://github.com/hewersonfreitas/module-href-lang.git"
		}
    ],
    ...
```
Procure o bloco `require`, informa ao composer para instalar seu pacote. Exemplo:

```json
    ...
    
    "require": {
        "hewersonfreitas/module-href-lang": "^1.0.0",
        "magento/product-community-edition": "2.3.5-p2",
    },

    ...
```

Para concluir a instalação execute o comando abaixo que o seu pacote seja instalado no Magento.
```bash
$ composer update
```


